<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Exception;
use Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
 
class EmployeeRegisterController extends Controller
{
    public $successStatus = 200;

    public $errorStatus = 400;
    
     
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees'],
            'password' => ['required'],
        ]);
        if($validator->fails()) { 
            return response()->json([
                "SuccessCode" => 400 ,
                "Message"=>"Invalid user Details", 
                "error"=>$validator->errors()
            ], 400);            
        }
        
           
            
        $input = $request->all(); 
        $input['password'] = Hash::make($input['password']); 
        $input['user_type']= 'Employee'; 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('myApp')-> accessToken; 
        $success['id'] =  $user->id;
        $success['name'] =  $user->name;
        $success['email'] =  $user->email;

        $employee = Employee::create([
            'name'      => $user->name,
            'email'     =>  $user->email,
            'password'  => $user->password,
            'user_id'   => $user->id,
            'role_id' =>request('role_id'),
            'address'   =>request('address'),
        ]);
         DB::table('online')->insert([
                'type'=>'Employee',
                'email'=>request('email'),
            ]);
        if($success){
            return response()->json(["SuccessCode" => 200 ,"Message"=>"Registration successfully","Data"=>$success], $this-> successStatus); 
        }
        else{
            return response()->json(["SuccessCode" => 400 ,"Message"=>"Please Enter registered email"], $this-> errorStatus); 
        }
       
        
    }

    public function login_check(Request $request){ 
        
        if(Auth::attempt(['email' => request('email'), 'password' => request('password'), 'user_type' =>'Employee'])){ 
                Session::put('user_email',request('email'));
                $user = Auth::User(); 
                $success['status'] = 200;
                $success['credentials'] = $user;
                $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                return response()->json(["SuccessCode" => 200 ,"Message"=>"Login successfully","Data"=>$success], $this-> successStatus); 
            }

            else{
            return response()->json(["SuccessCode" => 400 ,"Message"=>"Unauthorised Or User Details not Valid"], $this-> errorStatus); 
            } 

    }
    
 

    public function ForgotPasswordlink(Request $request) {
        
        $validator = Validator::make($request->all(),[
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
        ]);
        if($validator->fails()) { 
            return response()->json(["SuccessCode" => 400 ,"Message"=>"Invalid user Details", "error"=>$validator->errors()], 400);            
        }
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
         ]);

         $success = Mail::send('auth.forget-password-email', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
            $message->subject('Reset Password');
        });

        return response()->json(["SuccessCode" => 200 ,"Message"=>"We have emailed your password reset link!"], $this-> successStatus); 
            
    }


     public function ResetPassword($token) {

        return response()->json(["SuccessCode" => 200 ,"Message"=>"You have been successfully Generate Token for Reset Password!","token" => $token],$this-> successStatus);

    }

    public function ResetPasswordStore(Request $request) {
         
         $validator = Validator::make($request->all(),[
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'password' => ['required', 'confirmed'],
        ]);
        // echo"<pre>"; print_r($request->all()); exit();
                
        if($validator->fails()) { 
            return response()->json(["SuccessCode" => 400 ,"Message"=>"Invalid user Details", "error"=>$validator->errors()], 400);            
        } 
        
        $update = DB::table('employees')->where(['email' => $request->email])->first();

        if(!$update){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = Employee::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        // Delete password_resets record
        $updatepass = DB::table('users')->where(['email'=> $request->email]);
         
        return response()->json(["SuccessCode" => 200 ,"Message"=>"Your password has been successfully changed!"], $this-> successStatus); 
        
    }

    
    public function logout (Request $request) {
   
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
              
        return response()->json(["SuccessCode" => 200 ,"Message"=>"You have been successfully logged out!"], 200);
        }
        else{

        return response()->json(["SuccessCode" => 400 ,"Message"=>"Unauthorised Or User Details not Valid"], $this-> errorStatus); 
        }

    }
    
    public function get_employee_dashboard($id)
    { 
        $uid = $id;
        
        $userProfile = DB::table('employees')->join('past_job','past_job.employee_id','employees.past_job_id')
        ->where('id', $uid)
        ->get();
         
        if(count($userProfile) > 0){
            
             return response()->json([
                'SuccessCode'=> 200, 
                'message'=>'Employee Details',
                'profile'=>$userProfile,
                'past_job'=>$userProfile[0]->past_job_history_id,
                'assigned_task'=>$userProfile[0]->assigned_task_id,
            ], 403);
            
        } else {
            
             return response()->json([
                'SuccessCode'=>400,
                'message'=>'You Are not Logged In ! Login First',
            ], 403);
            
        } 
       
    }
    
    public function get_employee_profile($uid)
    {   
        
         
        $userProfile = Employee::join('roles,','roles.id','employees.role_id')->where('id',$uid)->get();
        
       
        if($userProfile){
            
            return response()->json([
                
                'SuccessCode'=> 200,
                'Message'=>'User Profile',
                'profile'=>$userProfile,
                
            ]);
            
        } else {
            
            return response()->json([
                
              'SuccessCode'=>400,
              'message'=>'You Are not Logged In ! Login First',
              
            ]);
            
        }
        
    }
    
    
    
    public function update_employee_profile(Request $request)
    {
        $username = $request->input('username');
        $email = $request->input('email');
        $zip = $request->input('zipcode');
        
        $uid = request('uid');
        $name = request('name');
        $email = request('email');
        $mobile = request('mobile');
        $location = request('location'); 
        
        $updateProfile = Employee::where('user_id', $uid)->update([
            'name'=>$name,
            'email'=> $email,
            'mobile'=>$mobile,
            'location'=>$location,
        ]);
        
        if($updateProfile){
            return response()->json([
                'SuccessCode'=> 200,
                'Message'=>'User Profile Updated',
                'profile'=>$updateProfile,
            ]);
        } else {
            return response()->json([
             'SuccessCode'=>400,
              'message'=>'You Are not Logged In ! Login First',
            ]);
        }
        
        
    }
   
    
    public function past_job_history($uid)
    {    
        $past_job_history = DB::table('employees') 
            ->join('past_job','past_job.id','employees.past_job_history_id')
            ->join('categories','categories.id','employees.past_job_history_id')
            ->join('services','services.category_id','categories.id') 
            ->join('customers','customers.id','employees.client_id')
            ->select('past_job.*','categories.name as category_name','customers.*','customers.name','customers.name as customer_name',
            'customers.address','customers.state','customers.zip_code','customers.country')
            ->where('employees.user_id','=',$uid)->get();
            
        
        if($past_job_history){
            return response()->json([
                'SuccessCode'=> 200,
                'Message'=>'Past Job History', 
                'past_job_history'=>$past_job_history,
            ]);
        } else {
            return response()->json([
              'SuccessCode'=>400,
              'message'=>'You Are not Logged In ! Login First',
            ]);
        } 
    }
    
    public function past_job_details($uid)
    {  
        $id = $uid;
        echo $id; 
       
        $past_job_details =DB::table('employees') 
            ->join('past_job','past_job.id','employees.past_job_history_id')
            ->join('categories','categories.id','employees.past_job_history_id')
            ->join('services','services.category_id','categories.id') 
            ->join('customers','customers.id','employees.client_id')
            ->select('past_job.*','categories.name as category_name','customers.*','customers.name','customers.name as customer_name',
            'customers.address','customers.state','customers.zip_code','customers.country')
            ->where('employees.user_id','=',$uid)->get();
        
        if($past_job_details){
            return response([
                'SuccessCode'=>200,
                'message'=>'past Job Details',
                'data'=>$past_job_details,
            ]);
        } else {
            return response()->json([
               'SuccessCode'=>400,
               'message'=>'You Are not Logged In ! Login First',
            ]);
        }
    }
    
    public function assigned_task($uid)
    {
         $id = $uid;
       
        $assigned_task = DB::table('employees') 
            ->join('past_job','past_job.id','employees.past_job_history_id')
            ->join('categories','categories.id','employees.past_job_history_id')
            ->join('services','services.category_id','categories.id') 
            ->join('customers','customers.id','employees.client_id')
            ->select('past_job.*','categories.name as category_name','customers.*','customers.name','customers.name as customer_name',
            'customers.address','customers.state','customers.zip_code','customers.country')
            ->where('employees.user_id','=',$uid)->get();
            
        
        if($assigned_task){
            return response([
                'SuccessCode'=>200,
                'message'=>'Assigned Tasks',
                'data'=>$assigned_task,
            ]);
        } else {
            return response()->json([
               'SuccessCode'=>400,
               'message'=>'You Are not Logged In ! Login First',
            ]);
        }
    }
    
    public function start_screen($uid)
    {   
        
      
        $data = DB::table('employees') 
            ->join('past_job','past_job.id','employees.past_job_history_id')
            ->join('categories','categories.id','employees.past_job_history_id')
            ->join('services','services.category_id','categories.id') 
            ->join('customers','customers.id','employees.client_id')
            ->select('past_job.*','categories.name as category_name','customers.*','customers.name','customers.name as customer_name',
            'customers.address','customers.state','customers.zip_code','customers.country')
            ->where('employees.user_id','=',$uid)->get();
        if($data){
            return response([
                'SuccessCode'=>200,
                'message'=>'Employee Start Screen',
                'data'=>$data,
            ]);
        } else {
            return response()->json([
               'SuccessCode'=>400,
               'message'=>'You Are not Logged In ! Login First',
            ]);
        }
    }
    
    public function end_screen($uid)
    {   
         
      
        $data = DB::table('employees') 
            ->join('past_job','past_job.id','employees.past_job_history_id')
            ->join('categories','categories.id','employees.past_job_history_id')
            ->join('services','services.category_id','categories.id') 
            ->join('customers','customers.id','employees.client_id')
            ->select('past_job.*','categories.name as category_name','customers.*','customers.name','customers.name as customer_name',
            'customers.address','customers.state','customers.zip_code','customers.country')
            ->where('employees.user_id','=',$uid)->get();
        if($data){
            return response([
                'SuccessCode'=>200,
                'message'=>'Employee End Screen',
                'data'=>$data,
            ]);
        } else {
            return response()->json([
               'SuccessCode'=>400,
               'message'=>'You Are not Logged In ! Login First',
            ]);
        }
    } 
    
    public function upload_startjob_image(Request $request)
    {
        $uid = request('uid');
        $path = $request->file('image');
        $image_name = time().'.'.$path->getClientOriginalExtension(); 
        $stored = $path->storeAs('startjob',$image_name); 
       
        $fullpath = url('public/startjob/'.$image_name);
       
        $store_image = Employee::where('user_id',$uid)->update([
            'image'=>$image_name,
            ]);
            
        if($store_image ){
            return response()->json([
            
            'SuccessCode'=>200,
            'message'=>'Start Job image uploaded',
            'image'=>$fullpath,
                
            ]);
        } else {
            return response()->json([
                'SuccessCode'=>400,
                'message'=>'You Are not Logged In ! Login First',   
            ]);
        }
        echo $uid;
      
    }
    
    public function upload_endjob_image(Request $request)
    {
        $uid = request('uid');
        $path = $request->file('image');
        $image_name = time().'.'.$path->getClientOriginalExtension(); 
        $stored = $path->storeAs('endjob',$image_name); 
        
        $fullpath = url('public/endjob/'.$image_name);
        
        $store_image = Employee::where('user_id',$uid)->update([
            'image'=>$image_name,
            ]);
            
        if($store_image){
            return response()->json([
            
            'SuccessCode'=>200,
            'message'=>'End Job image uploaded',
            'image'=>$fullpath,
                
            ]);
        } else {
            return response()->json([
                'SuccessCode'=>400,
                'message'=>'You Are not Logged In ! Login First',   
            ]);
        }
      
    }
    
    // public function assigned_task_details(Request $request)
    // {
    //     $userEmail = Session::get('user_email');
    //     $id = Employee::where('assigned_task_id',  $userEmail)[0]->assigned_task_id;
    //     $assigned_task_details = DB::table('assingn_job_subcontractor')
    //             ->where('id','=',$id)->get();
    //     if($assigned_task_detials){
    //         return response([
    //             'SuccessCode'=>200,
    //             'message'=>'past Job Details',
    //             'data'=>$assigned_task_details,
    //         ]);
    //     } else {
    //         return response()->json([
    //           'SuccessCode'=>400,
    //           'message'=>'You Are not Logged In ! Login First',
    //         ]);
    //     }
    // }
    
    public function clock_in(Request $request)
    {   
        $userEmail = Session::get('user_email');
        $time = $request->input('clockin');
        $clock_in = Employee::where('email',$userEmail)->update([
            'clockin'=>$time,
        ]);
        if($clock_in){
            return response([
                'SuccessCode'=>200,
                'message'=>'You have successfully started your job Please Commence with the assignment',
                'data'=>$clock_in,
            ]);
        } else {
            return response()->json([
               'SuccessCode'=>400,
               'message'=>'Login in First',
            ]);
        } 
    }
    
    public function clock_out(Request $request)
    {   
        $userEmail = Session::get('user_email');
        $time = $request->input('clock_out');
        $clock_out = Employee::where('email',$userEmail)->update([
            'clock_out'=>$time,
        ]);
        if($clock_out){
            return response([
                'SuccessCode'=>200,
                'message'=>'Clock Out Time',
                'data'=>$past_job_details,
            ]);
        } else {
            return response()->json([
               'SuccessCode'=>400,
               'message'=>'You Are not Logged In ! Login First',
            ]);
        }
    }
   
}
