<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public $successStatus = 200; 
    public $errorStatus = 400;

    public function index()
    {
         $category['category'] = Category::orderBy('ID','ASC')->get();
         $count = $category['category']->count();
     
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $link = "https"; 
        }
        else{
            $link = "http"; 
        }
        // Here append the common URL characters. 
        $link .= "://"; 
          
        // Append the host(domain name, ip) to the URL. 
        $link .= $_SERVER['HTTP_HOST']; 

        //$category['path'] = $link.'/Category_image';

        if($count > 0){
           
            return response()->json(['SuccessCode' => 200,'message'=>'All Categories are below' ,'data' => $category]);
        }else{
            return response()->json(['SuccessCode'=> 401,'message'=>'No Records Found.']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = Category::join('companies', 'companies.id', '=', 'categories.company_id')
            ->select('categories.*', 'companies.name as company_name')->get();
         $rules = [
            'name'=>'string|required|unique:categories',
            'category_image'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {

            return response()->json(['SuccessCode'=> 400,'message' => 'Category All Ready Created']);
            
        }
    
      $input=$request->all();
     
       if($request->hasFile('category_image')){
            
            $images = $request->file('category_image');
            $filename = rand(123456,999999).'.'.$images->getClientOriginalExtension();
            $image_resize = Image::make($images->getRealPath());              
                        $image_resize->resize(655,440);
                      
                         $image_resize->save(public_path('Category_image/'.$filename));
            
            //add image value in query
            $data['category_image'] = $image_resize;
            }


    $category=Category::create($input);
    // echo"<pre>"; print_r($category);exit();
    $success['category'] =  $category;
    $success['id']=$category->id;


    return response()->json(['SuccessCode' => 200,'message' => "Category Created Successfully",'data' =>$category]); 
 
    }

     
    public function store(Request $request)
    {
       print "<pre>";
       return response()->json(['data'=>$request->input()]);
    } 
    public function edit($id)
    {
        $category['category']=Category::findOrFail($id);
        
        if(count($category) > 0){
    
         return response()->json(['success' => 200,'data' => $category ]);
            
      }
      else
       {
           return response()->json(["SuccessCode" => 400 ,"Message"=>"Please Enter registered email"], $this-> errorStatus); 
          
       }
    }
 
    public function update(Request $request, $id)
    {
        
       $category=Category::findOrFail($id);
        $rules = [
            'name'=>'string|required|unique:categories,name'.$id,
            'category_image'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {

            return response()->json(['SuccessCode'=> 400,'message' => 'Something Missing in Category Detail Please Check']);
            
        }
    
        $data=$request->all();
     
        if($request->hasFile('category_image')){
            
            $images = $request->file('category_image');
            $filename = rand(123456,999999).'.'.$images->getClientOriginalExtension();
            $image_resize = Image::make($images->getRealPath());              
                        $image_resize->resize(655,440);
                      
                         $image_resize->save(public_path('Category_image/'.$filename));
            
            //add image value in query
            $data['category_image'] = $filename;
            }
        
        $sub_data=$category->fill($data)->save();
        $details['category'] =$category;
      
         return response()->json(['success' => 200,'message'=>"category Updated Successfully" ,'data' => $details]);    }
 
    public function destroy($id)
    {
        $category=Category::where('id',$id)->select('id','category_image')->get(); 

         if(isset($category[0]->category_image) && $category[0]->category_image != ''){
                $path = public_path().'Category_image/'.$category[0]->category_image ;
            if (file_exists($path)) {
                 unlink($path);
            }
        }
        $status=Category::destroy($category);
        
        if($status){
         return response()->json(['SuccessCode' => 200,'massage' => 'Category Deleted successfully']);
        }
        else{
            return response()->json(['SuccessCode'=> 400,'massage'=>'Category Id is not Availble']);
        }
    }
    
    public function get_simple_services()
    { 
       
        $services = DB::table('categories')
        ->join('services','services.category_id','categories.id')
        ->get();
        if($services){
            return response()->json(
            [
                'SuccessCode'=> 200,
                'massage'=> 'Services',
                'data'=>$services,
            ]); 
        }else {
            return response()->json(
            [
                'SuccessCode'=> 400,
                'massage'=>'Login first',
                 
            ]); 
        }
    }
    
    public function get_simple_services_list($uid)
    {  
        
         $services = Category::join('services','services.category_id','=','categories.id')
        ->where('id','=',$uid)
        ->get();
        
        if($services){
            return response()->json(
            [
                'SuccessCode'=> 200,
                'massage'=>'Services list',
                'data'=>$services,
            ]); 
        }else {
            return response()->json(
            [
                'SuccessCode'=> 400,
                'massage'=>'Log in first',
                 
            ]); 
        }
        
    }
    
    
    Public function store_service_image(Request $request)
    { 
        print "<per>";
        
        $uid = request('uid');
        $user_data = User::where('user_id' , $uid)->get(); 
        
        $path = $request->file('image');
        $image_name = time().'.'.$path->getClientOriginalExtension();
        $stored = $path->storeAs('images', $image_name);
        $fullpath = url('public/images/'.$image_name);
        
        
        $saveimage = User::where('user_id',$uid)->update([
                'image'=>$image_name,
            ]);
        
        // $u = [
        //         //'email'=>$user_data[0]->email,
        //          'userId'=>$user_data[0]->id,
        //          'url'=>$fullpath,
        //     ];
        if($saveimage){
             
             return response()->json([
                'SuccessCode'=>200,
                 'message'=>'Image Uploaded Successfylly', 
                  
                 'url'=>$fullpath,
             ]);
        }
        else {
            return response()->json([
                'SuccessCode'=>400,
                 'message'=>'Image Not selected', 
             ]);
        }
    }
    
    public function add_description(Request $request)
    { 
         
        $uid = request('uid');
        $cid = request('categorey_id');
        $sid = json_encode(request('service_id')); 
        $description = request('description');   
          
        $user_data = User::find($uid); 
         
        $store_desc = DB::table('simpleview_mobile_data')->insert([
                'user_id'=> $uid,
                'categorey_id'=>$cid,
                'services_id'=>$sid,
                'description'=>$description,
                'image'=>'$image',
                
        ]);
            
        $data = DB::table('simpleview_mobile_data')->where('user_id','=',$uid)->get();
        
        if($store_desc){
                return response()->json([
                    'SuccessCode'=> 200,
                    'massage'=>'Description Saved Successfully', 
                    'data'=> $data,
                    ]);
        } else {
                return response()->json(
                [
                    'SuccessCode'=> 400,
                 'message'=>'Log in first',
                     
                ]);   
        } 
        
        
    }
    
    
    public function get_appointments()
    {   
        $uid = request('uid');
        $appointment = DB::table('appointments')
        ->join('categories','categories.id','appointments.categorey_id')
        ->join('services','services.category_id','categories.id')->get(); 
        
        if($appointment){
            return response()->json(
            [
                'SuccessCode'=> 200,
                'massage'=>'Appointments are below', 
                'data'=> $appointment ,
                
            ]); 
        } else {
            return response()->json(
            [
                'SuccessCode'=> 400,
             'message'=>'Log in first'
                 
            ]); 
        }  
    }
    
    public function book_appointment($uid)
    {   
        // $appointment = DB::table('categories')
        // ->join('services')
        // ->where('userid')->get();   
        // $book_appointment = DB::table('book_appointment')->insert([
        //     'categorey_id'=>req,
        //     'service_id'=>,
        //     'user_id'=> $uid,
        //     ]);
        echo $uid;
        
            
    }
    public function get_past_appointments($uid)
    {   
      
        $uid;
         
        // $mainServiceName = DB::table('past_appointments')
        //     ->join('categories','categories.id','past_appointments.categorey_id')
        //     ->join('services','services.category_id','categories.id')
        //     ->select('categories.name as category_name','services.service_name as main_service_name')
        //     ->where('past_appointments.u_id','=',$uid)->get();
    
        
        $categories = DB::table('past_appointments')
            ->join('categories','categories.id','past_appointments.categorey_id')
            ->join('services','services.category_id','categories.id')
            ->join('customers','customers.id','past_appointments.customer_id')
            ->select('categories.*','categories.category_image as categoryImage',
            'services.service_name as main_service_name','services.date','services.time'
            ,'customers.name as customer_name','customers.address',
            'customers.state','customers.zip_code','customers.country','customers.email','customers.mobile')
            ->where('past_appointments.u_id','=',$uid)->get()->toArray();
        
        // $emp = array();
        // foreach($categories as $cat)
        // {
        //     $cat['services'] = DB::table('services')->where('category_id','=',1)->get();
        //     array_push($emp, $cat);
        // }
          
        $services = DB::table('past_appointments')
        ->join('categories','categories.id','past_appointments.categorey_id')
        ->join('services','services.category_id','categories.id')
        ->join('customers','customers.id','past_appointments.customer_id')
        ->select('services.category_id','services.id','services.service_name as sname'
        ,'services.status')
        ->where('u_id','=',$uid)->get();
        
        
        $a = DB::table('past_appointments')->where('u_id','=',$uid)->get();
        $b = $a[0]->service_id;
        
        if($categories[0]->id == $services[0]->category_id){
             return response()->json(
                [
                    'SuccessCode'=> 200,
                    'massage'=>'Past Appointments',
                    'categories'=>$categories[0]->id,
                    'data'=>$services[0]->id,
                  
                    
                ]); 
        }
        
        $data = array('categories'=>$categories,'services'=>$services);
        
        
        for($i=0; $i<count($categories); $i++){
          // array_push($data, $categories[$i], $services[$i]);
           
        }
        
        //$data = array_merge($categories, $services);
         
        if($categories){
             return response()->json(
                [
                    'SuccessCode'=> 200,
                    'massage'=>'Past Appointments',  
                    // 'categories'=>$categories,
                    // 'services'=>$services,
                   'data'=>$services,
                  
                    
                ]); 
         
        }else {
            return response()->json(
            [
                'SuccessCode'=> 400,
                'message'=>'Log in first'
                 
            ]); 
        }
       
    }
    
  public function get_past_appointments(Request $request)
    {

        $uid = $request->user_id;

        $validation = Validator::make($request->all(), [

            'user_id' => 'required',

        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();

            return response()->json([
                'errors' => $errors
            ], 403);
        }
        $data = DB::table('past_appointments')->where('past_appointments.u_id', $uid)->get();
        if (count($data)>0) {
            $categories = DB::table('past_appointments')
                ->select('past_appointments.date', 'past_appointments.service_id', 'past_appointments.time', 'categories.name as CategoryName', 'customers.name', 'customers.email', 'customers.mobile', 'customers.address', 'customers.state', 'customers.zip_code')
                ->join('categories', 'categories.id', 'past_appointments.categorey_id')
                ->join('customers', 'customers.id', 'past_appointments.customer_id')
                ->where('past_appointments.u_id', $uid)
                ->get()->toArray();


            $past_jobs =  [];
            foreach ($categories as $cat) {

                $services = DB::table('services')->select('service_name', 'id')->whereIn('id', explode(',', $cat->service_id))->get();

                $cat->services = $services;


                array_push($past_jobs, $cat);
            }



            return response()->json(
                [
                    'success' => 1,
                    'massage' => 'Past Appointments Lists',
                    'response' => $past_jobs,


                ],
                200
            );
        }
        else{
            return response()->json(
                [
                    'success' => 1,
                    'massage' => 'Past Appointments Lists',
                    'response' => 'No appointments to show',
                ],
                200
            );
        }
    }
    
    public function get_appointment_details($id)
    {
        //$uid = $request->input('uid');
        $uid = $id; 
        
        $appointment_details = DB::table('appointments')
            ->select('users.name as userName','users.email','users.mobile','users.location',
                'categories.name', 'categories.category_image','categories.id',
                'services.service_name',
                'appointments.date','appointments.time')
            ->join('categories','categories.id','appointments.categorey_id')
            ->join('services','services.category_id','categories.id')
            ->join('users','users.id','appointments.u_id') 
        ->where('u_id','=',$uid)->get(); 
        
        if($appointment_details){
            return response()->json(
            [
                'SuccessCode'=> 200,
                'massage'=>'Appointment Details', 
                'appointment_details'=> $appointment_details,
                
            ]); 
        }else {
            return response()->json(
            [
                'SuccessCode'=> 400,
             'message'=>'Log in first'
                 
            ]); 
        }
    }
    
    public function get_quotation($uid)
    {    
         
        $quotations = DB::table('appointments')
                ->select('users.name as userName','users.email','users.mobile','users.location',
                        'categories.name as cname', 'categories.category_image','categories.id',
                        'services.service_name',
                        'appointments.date','appointments.time')
                ->join('categories','categories.id','appointments.categorey_id') 
                ->join('services','services.category_id','appointments.service_id')  
                ->join('users','users.id','appointments.u_id') 
                ->where('u_id','=',$uid)->get(); 
        
        if($quotations){
            return response()->json(
            [
                'SuccessCode'=> 200,
                'massage'=>'Quotation', 
                'data'=> $quotations,
                'status'=> 'Status quotation',
                
            ]); 
        }else {
            return response()->json(
            [
                'SuccessCode'=> 400,
             'message'=>'Log in first'
                 
            ]); 
        } 
    }
    
    
    public function get_scopes($id)
    {
    
        //$id = $request->input('uid'); 
        
        $services = DB::table('services')
            ->join('categories','category.id','services.category_id')
            ->where('services.category_id','=',$id)
        ->get();
        if($services)
        {
            return response()->json(
            [
                'SuccessCode'=> 200, 
                'message'=>'Scopes',
                'data'=> User::find($id),
                'status'=> 'Scopes',
                
            ]); 
        } else {
            return response()->json(
            [
                'SuccessCode'=> 400,
             'message'=>'Log in first'
                 
            ]); 
        } 
    }
    
    public function profile_management()
    {
       
        $id = request('uid'); 
         
        $user = User::find($id);
        if($user)
        {
            return response()->json(
            [
                'SuccessCode'=> 200, 
                'message'=>'User Profile Details',
                'data'=> $user,
                'image'=>DB::table('simpleview_mobile_data')->select('image')->distinct()->where('user_id','=',$id)->first(),
            ]); 
        } else {
            return response()->json(
            [
                'SuccessCode'=> 400,
                'massage'=>'Profile Id is not Availble',
                 
            ]); 
        }
    }
    
    public function profile(Request $request)
    { 
        
        $uid = request('uid'); 
        $name = request('name');
        $email = request('email');
        $mobile = request('mobile');
        $location = request('location');  
        $image = request('image');
        
       
        $updateProfile = User::where('id', $uid)->update([
            'name'=>$name,
            'email'=> $email,
            'mobile'=>$mobile,
            'location'=>$location,
        ]);
        
        $updateImage = 
        DB::table('simpleview_mobile_data')->where('user_id','=',$uid)->update([
                'image'=>$image,
            ]);
        
        if($updateProfile){ 
            return response()->json([
                'SuccessCode'=> 200,
                'Message'=>'User Profile Updated',
                'data'=>User::find($uid),
               
            ]);
            
        } else {
            
            return response()->json([
              'SuccessCode'=>400,
              'message'=>'Login First',
            ]);
            
        } 
    } 
    
    public function see_all()
    {
        $seeAll = DB::table('categories')->get();
       
        if($seeAll){ 
            return response()->json([
                'SuccessCode'=> 200,
                'Message'=>'User Profile Updated',
                'data'=>$seeAll,
               
            ]);
            
        } else {
            
            return response()->json([
              'SuccessCode'=>400,
              'message'=>'Login First',
            ]);
            
        }  
    }
    
}
