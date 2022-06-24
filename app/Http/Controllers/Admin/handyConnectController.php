<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminCrmService;
use App\Models\Quotation;
use App\Models\User;
use App\Models\VendorCrm;
use App\Models\AdminCrm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use DB;
use PDF;
class handyConnectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $work_item = DB::table('list_of_works')->get();
        $scope = DB::table('scope_of_works')->get();

        $residential = DB::table('residential')->get();
        $commercial = DB::table('commercial')->get();
        $designers = DB::table('designers')->get();

        return view('admin.quotation.add')
        ->with('work', $work_item)
        ->with('scope',$scope)
        ->with('residential', $residential)
        ->with('commercial',$commercial)
        ->with('designers', $designers);
    }

   
    public function get_services_list(Request $request)
    {
         $id = $request->post('id');
         $data = DB::table('services')->get(); 
         $designers = DB::table('designers')->get();
         $residential = DB::table('residential')->get(); 
         $commercial = DB::table('commercial')->get();
         $lof = DB::table('list_of_works')->get();
         $sof = DB::table('scope_of_works')->where('scope_id','=',$id)->get();
          return response()->json([
            'data'=> $data,
            'designers'=>$designers,
            'residential'=> $residential,
            'commercial'=> $commercial,
            'lof'=> $lof,
            'sof'=> $sof,
          ]);
        
    }
    public function get_menu($id)
    {
        $work_item = DB::table('list_of_works')->get();
        $scopes = DB::table('scope_of_works')->where('scope_id','=', $id)->get(); 
         

        $sof = DB::table('scope_of_works')->where('scope_id','=',$id)->get();
        return response()->json($sof); 
        
    }
    

     
    public function quatation_save(Request $request)
    {
        print "<pre>"; 

        $designers = DB::table('designers')->where('id','=',$request->post('designer_id'))->get();   
         
     
        $customer_name = $request->post('customer_name');
        $id = $request->post('id');
        $delivery_date = $request->post('delivery_date');
        $companyName = $request->post('company_id');
        $designer = $request->post('designer_id');

        $address = $request->post('address');
        $country = $request->post('country');
        $state = $request->post('state');
        $zip_code = $request->post('zip-code');
        $email = $request->post('email');
        $mobile = $request->post('mobile');  
        
        $services = $request->post('all_services_details');

        $forpdf = [
            'customer_name' => $customer_name, 
            'id' => $id, 
            'delivery_date' => $delivery_date, 
            'company_name'=>$companyName.time(), 
            'address' => $address, 
            'country' => $country, 
            'state'=>$state,
            'zip_code'=>$zip_code, 
            'email' => $email, 
            'mobile' => $mobile,
             
            
        ];

        //print_r($request->post());
        
       //   print_r($request->post('services_list'));
       // print_r($request->post('all_service_details')[0] );
       //  print_r($request->post('quantity'));
        // print_r($request->post('uom'));
        // print_r($request->post('tax'));

        // foreach($request->post('all_service_details')[0]['services_list'] as $sl){
        //     // $array[] =  $sl;
        //     // echo implode(',', $array);
        //     echo $sl;
        // }

        //echo  count($request->post('all_service_details')[0] ); 

        $pdf = PDF::loadView('admin.crm.pdf_page' , $forpdf ); 
        return $pdf->download(time().'.pdf'); 

        // foreach($request->post('all_service_details') as $sd){
             
        //   }
        //   echo count($request->post('all_service_details'));

        //    for($i=0; $i<=count($request->post('all_service_details')) ; $i++){
        //      print_r($request->post('services_list'));
        //    }

            
    } 
    
    public function display()
    {
         $result = DB::table('services')->get();
         echo json_encode($result);
    }
    
    public function get_services_row($id){
          $result = DB::table('unit_of_measures')->where('id','=',$id)->get();
        echo json_encode($result);
    }

    public function get_selected_row($id)
    {
      $result = DB::table('services')
        ->join('unit_of_measures','unit_of_measures.id','=','services.unit_of_measure_id')
        ->where('services.id',$id)->get();

        echo json_encode($result);

    } 
    
     
     
    public function get_rows($id)
    {
        $servics = DB::table('services')
        ->join('unit_of_measures','unit_of_measures.id','=','services.unit_of_measure_id')
        ->where('services.id',$id)->get();
         $services = DB::table('services')->where('id','=',$id)->get();

        echo json_encode($services);
    }
    //scopes list get

    public function get_all_scopes($id){
        $scopes = DB::table('scope_of_works')->where('id','=',$id)->get();
        echo json_encode($scopes);
    }
    public function hc_quotation(Request $request){ 

            // print_r($result->all()); exit();
        
            $qty = implode('-',$request->post('qty'));
            $uom = implode('-',$request->post('uom'));
            $tax = implode('-',$request->post('tax'));
            $price = implode('-',$request->post('price'));

            $total_price = $request->post('total-price');
            $total_tax = $request->post('total-tax');
            $final_price  = $request->post('final-price');

            $customer = $request->post('customer-name');
            $delivary_date = $request->post('delivery-date');
            $company = $request->post('company');
            $address = $request->post('address');
            $country = $request->post('country');
            $state = $request->post('state');
            $email = $request->post('email');
            $mobile = $request->post('mobile');

            $data = [
                'customer_name'=>$customer,
                'delivary_date'=>$delivary_date,
                'company'=>$company,
                'address'=>$address,
                'country'=>$country,
                'state'=>$state,
                'email'=>$email,
                'mobile'=>$mobile,

                'qty'=> $qty,
                'uom'=>$uom,
                'tax'=>$tax,
                'price'=>$price,

                'total_price'=>$total_price,
                'total_tax'=>$total_tax,
                'final_price'=>$final_price,

            ];
        $db = DB::table('hc_quotations')->insert($data);
        
        $unique_id = Quotation::orderBy('id', 'desc')->first();
        $total = AdminCrmService::where('admin_crm_id', $request->id)->sum('price');
        $total_quantity =  AdminCrmService::where('admin_crm_id', $request->id)->sum('quantity');


        $number = str_replace('HCQ', '', $unique_id ? $unique_id->quotation_unique_id  : 0);
        if ($number == 0) {
            $number = 'HCQ0000001';
        } else {
            $number = "HCQ" . sprintf("%07d", $number + 1);
        }


        $qc = Quotation::create([
            'quotation_unique_id'   => $number,
            'lead_id'               => $request->id,
            'total_price'           => $total,
            'quantity'              => $total_quantity,
            'tax'                   => implode(',', $request->tax),
            // 'final_price'           => $request->price,
            'tax_price'             => $total_tax,
            'final_price_with_tax'  => $final_price,
            'create_by'             => Auth::user()->id,
            'vendor_id'             => Auth::user()->vendor_id,
            'vendor_crm_id'         => $request->vendor_crm_id
        ]);


// echo "<pre>";
// print_r($qc); exit();
            
           if($qc){ 
             // return view('admin.quotation_list')->with(['id' => $require->id,'status' => 'success', 'message' => 'Quotation Save Successfully']);
            return response()->json(['status' => 'success', 'message' => 'Quotation Save Successfully', 
                'url' => URL::signedRoute('admin.quotation_list',$request->id)]);
           }
            
    }

    // public function list($id)
    // { 
    //     return view('admin.quotation.list')->with('id', $id);
    // }
}
