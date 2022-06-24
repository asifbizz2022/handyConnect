<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminCrm;
use App\Models\AdminCrmService;
use App\Models\Quotation;
use App\Models\User;
use App\Models\VendorCrm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use DB;
use PDF;
class AdminQuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = AdminCrm::join('customers', 'customers.id', '=', 'admin_crms.customer_id')
            ->select('admin_crms.*', 'customers.name', 'customers.email', 'customers.mobile');
        return DataTables::of($data)
            ->addColumn('unique_id', function ($row) {
                return $row->crm_unique_id;
            })
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('email', function ($row) {
                return $row->email;
            })
            ->addColumn('mobile', function ($row) {
                return $row->mobile;
            })
            ->addColumn('action', function ($row) {
                $action = '';
                $action .= '<a class="btn btn-soft-success  btn-icon btn-circle btn-sm" href="' . URL::signedRoute('admin.quotation_list', $row->id) . '"  data-toggle="tooltip" title="' . __('role.edit') . '"> <i class="las la-eye"></i></a>';
                $action .= '<a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="' . URL::signedRoute('admin.admin_quotation.show', $row->id) . '" data-toggle="tooltip" title="Create Quotation"> <i class="las la-edit"></i></a>';
                return $action;
            })
            ->rawColumns(['unique_id', 'action'])->make(true);
    }

   
    public function store(Request $request)
    {
 
        $request->validate([
            'id'    => 'required|exists:admin_crms,id',
            'tax'   => 'required',
            // 'price' => 'required|numeric'
        ], [
            'id.exists' => 'Some thing Wrong Please Refresh! ',
            'tax.required' => 'Please Select Tax',
            // 'price.required' => 'Please Enter Expected Price'
        ]);

        $total = AdminCrmService::where('admin_crm_id', $request->id)->sum('price');
        $total_quantity =  AdminCrmService::where('admin_crm_id', $request->id)->sum('quantity');

        $tax = 0;
        foreach ($request->tax as $item) {
            $tax += $item;
        }

        $cal_tax = $total * ($tax / 100);
        $final_price_with_tax = $total + $cal_tax;


        $unique_id = Quotation::orderBy('id', 'desc')->first();
        $number = str_replace('HCQ', '', $unique_id ? $unique_id->quotation_unique_id  : 0);
        if ($number == 0) {
            $number = 'HCQ0000001';
        } else {
            $number = "HCQ" . sprintf("%07d", $number + 1);
        }

        Quotation::create([
            'quotation_unique_id'   => $number,
            'lead_id'               => $request->id,
            'total_price'           => $total,
            'quantity'              => $total_quantity,
            'tax'                   => implode(',', $request->tax),
            // 'final_price'           => $request->price,
            'tax_price'             => $cal_tax,
            'final_price_with_tax'  => $final_price_with_tax,
            'create_by'             => Auth::user()->id,
            'vendor_id'             => Auth::user()->vendor_id,
            'vendor_crm_id'         => $request->vendor_crm_id
        ]);

        //  $forpdf = [
            
        //     'quotation_unique_id'   => $number,
        //     'lead_id'               => $request->id,
        //     'total_price'           => $total,
        //     'quantity'              => $total_quantity,
        //     'tax'                   => implode(',', $request->tax),
        //     // 'final_price'           => $request->price,
        //     'tax_price'             => $cal_tax,
        //     'final_price_with_tax'  => $final_price_with_tax,
        //     'create_by'             => Auth::user()->id,
        //     'vendor_id'             => Auth::user()->vendor_id,
        //     'vendor_crm_id'         => $request->vendor_crm_id 
            
        // ];
         // $pdf = PDF::loadView('admin.quotation.pdf' , $forpdf ); 
         
         // echo "<pre>"; print_r($forpdf); exit();
         
   
        echo json_encode(['status' => 'success', 'message' => 'Quotation Save Successfully', 'url' => URL::signedRoute('admin.quotation_list', $request->id)]);

        // return $pdf->download(time().'.pdf'); 

           

    }

     
    public function show($id)
    {
        $work_item = DB::table('list_of_works')->get();
        $scope = DB::table('scope_of_works')->get();

        $residential = DB::table('residential')->get();
        $commercial = DB::table('commercial')->get();
        $designers = DB::table('designers')->get();
        
        $data = AdminCrm::join('customers', 'customers.id', '=', 'admin_crms.customer_id')
            ->join('companies', 'companies.id', '=', 'admin_crms.company_id')
            ->select(
                'admin_crms.*',
                'customers.name as customer_name',
                'customers.email',
                'customers.address',
                'customers.country',
                'customers.zip_code',
                'customers.state',
                'customers.mobile',
                'companies.name as companies_name'
            )
            ->where('admin_crms.id', $id)->first();
        $total = AdminCrmService::where('admin_crm_id', $id)->sum('price');
        $total_quantity =  AdminCrmService::where('admin_crm_id', $id)->sum('quantity');
        return view('admin.quotation.index')->with(['data' => $data, 'total' => $total, 'total_quantity' => $total_quantity]);
 
       
    }

    public function list($id)
    { 
        return view('admin.quotation.list')->with('id', $id);
    }

    public function get_all_list()
    {
        $data = Quotation::where('lead_id', request()->id);
        if (Auth::user()->user_type == 'Admin') {
            $data = $data->get();
        } else {
            $data = $data->where('create_by', Auth::user()->id)->get();
        }
        return DataTables::of($data)
            ->addColumn('unique_id', function ($row) {
                return $row->quotation_unique_id;
            })
            ->addColumn('total_price', function ($row) {
                return '$' . $row->total_price;
            })
            ->addColumn('quantity', function ($row) {
                return $row->quantity;
            })
            ->addColumn('tax', function ($row) {
                return $row->tax;
            })
            // ->addColumn('final_price', function ($row) {
            //     return '$' . $row->final_price;
            // })
            ->addColumn('tax_price', function ($row) {
                return '$' . $row->tax_price;
            })
            ->addColumn('final_price_with_tax', function ($row) {
                return '$' . $row->final_price_with_tax;
            })
            ->addColumn('approve', function ($row) {
                if ($row->approve == 1)
                    return '<span class="badge badge-inline badge-success">Accepted</span>';
                elseif ($row->approve == 2)
                    return '<span class="badge badge-inline badge-success">Pending</span>';
                else
                    return '<span class="badge badge-inline badge-danger">Rejected</span>';
            })
            ->addColumn('action', function ($row) {
                $user = User::find(Auth::user()->id);
                $role = Role::where('name', $user->getRoleNames())->first();
                $action = '';
                if ($role->name == 'Admin') {
                    $action .= '<a class="btn btn-soft-success  btn-icon btn-circle btn-sm" href="javascript:void(0)"  data-toggle="tooltip" title="Add Platform Fee" onclick="open_platform_modal(' . $row->final_price_with_tax . ',' . $row->id . ')"> <i class="las la-eye"></i></a>';
                    $action .= '<a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)"  data-toggle="tooltip" title="Status" onclick="open_approve_modal(' . $row->id . ',' . $row->lead_id . ')"> <i class="las fa-check"></i></a>';
                }
                // $action .= '<a class="btn btn-soft-danger  btn-icon btn-circle btn-sm" href="javascript:void(0)" data-toggle="tooltip" title="' . __('role.delete') . '" onclick="open_delete_modal(' . $row->id . ')"> <i class="las la-trash"></i></a>';
                return $action;
            })
            ->rawColumns(['unique_id', 'action', 'approve'])->make(true);
    }

    public function approve(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:quotations,id'
        ], [
            'id.required' => 'Please Refresh Something Wrong!'
        ]);
        Quotation::find($request->id)->update([
            'approve'       => 1,
            'approve_date'  => now()
        ]);

        Quotation::where('lead_id', $request->lead_id)->where('id', '!=', $request->id)->update([
            'approve'       => 0,
            'approve_date'  => now()
        ]);

       /* Quotation::where('lead_id', $request->lead_id)->where('id', '=', $request->id)->update([
            'approve'       => 2,
            'approve_date'  => now()
        ]);        */
        echo json_encode(['status' => 'success', 'message' => 'Accept Successfully']);
    }

    public function add_platform_fee(Request $request)
    {
        $request->validate([
            'id'            => 'required|exists:quotations,id',
            'tax_type'      => 'required',
            'tax'           => 'required|numeric',
            'platform_fee'  => 'required|numeric'
        ], [
            'id.required'           => 'Please Refresh Something Wrong!',
            'tax_type.required'     => 'Please Select Tax Type',
            'tax.required'          => 'Please Enter Tax',
            'platform_fee.required' => 'Please Enter Platform Fee'
        ]);

        $old_data = Quotation::find($request->id);

        if ($request->tax_type == 1) {
            $tax_cal = $request->platform_fee * ($request->tax / 100);
            $final = $old_data->final_price_with_tax + $request->platform_fee + $tax_cal;
        } else {
            $tax_cal = $request->platform_fee + $request->tax;
            $final = $old_data->final_price_with_tax + $request->platform_fee + $tax_cal;
        }

        Quotation::find($request->id)->update([
            'platform_tax_type' => $request->tax_type,
            'platform_tax' => $request->tax,
            'platform_fee' => $request->platform_fee,
            'final_fee_with_platform' => $final
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Fee Add Successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
     
    public function works_list()
    {
        
        $work_item = DB::table('list_of_works')->get();
        $scope = DB::table('scope_of_works')->get();

        $residential = DB::table('residential')->get();
        $commercial = DB::table('commercial')->get();
        $designers = DB::table('designers')->get();
        return view('admin.lead.works')
        ->with('work', $work_item)
        ->with('scope',$scope)
        ->with('residential', $residential)
        ->with('commercial',$commercial)
        ->with('designers', $designers);
    }
    public function scope_menu($id)
    {
        $work_item = DB::table('list_of_works')->get();
        $scopes = DB::table('scope_of_works')->where('scope_id','=', $id)->get(); 
        return response()->json($scopes); 
    }
    public function works_table_data()
    {
//        $data = DB::table('invoice')
//                ->join('scope_of_works','scope_of_works.scope_id','=','invoice.scope_of_work')
//                ->join('list_of_works','list_of_works.scope_id','=','invoice.type_of_work')
//                ->get(); 
        $data = DB::table('invoice')->get();
        return response()->json($data); 
        
    }
    public function scope_menu_commercial($id)
    {
        $work_item = DB::table('list_of_works')->get();
        $scopes = DB::table('scope_of_works')->where('scope_id','=', $id)->get(); 
        return response()->json($scopes); 
    }
    public function generate_quotation()
    {
       return view('admin.lead.generate-quotation');
    }
     
    public function invoice_residential(Request $request)
    {     
            $companyName = $request->post('company-name').'-'.date('Y m d');
            $service_type = $request->post('service-type') ; 

            $date = date('m-d-Y'); 

            $desid = $request->post('designers');
            $data = [ 
            'customer_name'=>$request->post('customer-name'),
            'date'=>$date,
            'customer_contact'=>$request->post('customer-contact'),
            'company_name'=> $companyName,
            'company_address'=>$request->post('address'),
            'company_country'=>$request->post('country'),
            'company_state'=>$request->post('state'),
            'company_zip'=>$request->post('zip-code'),
            'company_email'=>$request->post('e-mail'),
            'company_mobile'=>$request->post('mobile'), 
            'designer_id'=> $desid,
            'service_type'=>  $request->post('service-type-residential') , 

            'list_of_work' =>  @$request->post('list-of-work') ,
            'scope_of_work'=> @implode(',',$request->post('scope-of-work')),
            
            'cost_price'=>implode(',',$request->post('price')),
            
            'markup_percent'=>implode(',',$request->post('markup-percent')),
            'markup_amount'=>implode(',',$request->post('markup-amount')),
            'margin_percent'=>implode(',',$request->post('margin-percent')),
            'discount_percent'=>implode(',',$request->post('discount-percent')), 
            'uom'=>implode(',',$request->post('quantity-input')),
             'net_price'=>  $request->post('net-sum-price') ,
         ];  
        
        
        $tofid = $request->post('list-of-work');
        $lof = DB::table('list_of_works')->where('id','=', $tofid)->get() ; 
        $desg = DB::table('designers')->where('id','=', $desid)->get() ;
        
        print "<pre>";
        $sow =   @implode(',',$request->post('scope-of-work'));
        $find = count(DB::table('interior_quotation')->whereIn('scope_of_work', array($sow))->where('list_of_work','=', $request->post('list-of-work') )->get());
        
        if($find){
            $forpdf = [
            'customer_name'=>$request->post('customer-name'),
            'date'=>$date,
            'customer_contact'=>$request->post('customer-contact'),
            'company_name'=>$companyName,
            'company_address'=>$request->post('address'),
            'company_country'=>$request->post('country'),
            'company_state'=>$request->post('state'),
            'company_zip'=>$request->post('zip-code'),
            'company_email'=>$request->post('e-mail'),
            'company_mobile'=>$request->post('mobile'), 

            'service_type'=>  $request->post('service-type-residential') , 

            'list_of_work' =>  $lof[0]->work_name,
            'scope_of_work'=> @implode(',',$request->post('scopes_stack')),
            
            'cost_price'=>implode(',',$request->post('price')),

            'markup_percent'=>implode(',',$request->post('markup-percent')),
            'markup_amount'=>implode(',',$request->post('markup-amount')),
            'margin_percent'=>implode(',',$request->post('margin-percent')),
            'discount_percent'=>implode(',',$request->post('discount-percent')), 
            'net_price'=>  $request->post('net-sum-price') , 
            'qty'=>implode(',',$request->post('quantity-input')),

            'd_name'=> $desg[0]->name ,
            'd_email'=>$desg[0]->email,
            'd_contact'=>$desg[0]->contact,

            'type'=> 'VOI - '.date('Ymd'),

            ];
             $pdf = PDF::loadView('admin.lead.pdf-residential',$forpdf ); 
            return $pdf->download('$service_type.time().pdf'); 
        }
        else {
                
             $forpdf = [
            'customer_name'=>$request->post('customer-name'),
            'date'=>$date,
            'customer_contact'=>$request->post('customer-contact'),
            'company_name'=>$companyName,
            'company_address'=>$request->post('address'),
            'company_country'=>$request->post('country'),
            'company_state'=>$request->post('state'),
            'company_zip'=>$request->post('zip-code'),
            'company_email'=>$request->post('e-mail'),
            'company_mobile'=>$request->post('mobile'), 

            'service_type'=>  $request->post('service-type-residential') , 

            'list_of_work' =>  $lof[0]->work_name,
            'scope_of_work'=> @implode(',',$request->post('scopes_stack')),
            
            'cost_price'=>implode(',',$request->post('price')),

            'markup_percent'=>implode(',',$request->post('markup-percent')),
            'markup_amount'=>implode(',',$request->post('markup-amount')),
            'margin_percent'=>implode(',',$request->post('margin-percent')),
            'discount_percent'=>implode(',',$request->post('discount-percent')), 
            'net_price'=>  $request->post('net-sum-price') , 
            'qty'=>implode(',',$request->post('quantity-input')),

            'd_name'=> $desg[0]->name ,
            'd_email'=>$desg[0]->email,
            'd_contact'=>$desg[0]->contact,

            'type'=> 'Not VOI '.time(),

            ];
             DB::table('interior_quotation')->insert($data);
            $pdf = PDF::loadView('admin.lead.pdf-residential',$forpdf ); 
            return $pdf->download('$service_type.time().pdf'); 
        }   
        
        print "<pre>";
         
        //print_r($st);
    }
     public function invoice_commercial(Request $request)
    {    
             
            $companyName = $request->post('company-name').'-'.date('Y m d');
            $service_type = $request->post('service-type') ; 

            $date = date('m-d-Y'); 

            $desid = $request->post('designers');
            $data = [ 
            'customer_name'=>$request->post('customer-name'),
            'date'=>$date,
            'customer_contact'=>$request->post('customer-contact'),
            'company_name'=> $companyName,
            'company_address'=>$request->post('address'),
            'company_country'=>$request->post('country'),
            'company_state'=>$request->post('state'),
            'company_zip'=>$request->post('zip-code'),
            'company_email'=>$request->post('e-mail'),
            'company_mobile'=>$request->post('mobile'), 
            'designer_id'=> $desid,
            'service_type'=>  $request->post('service-type-commercial') , 

            'list_of_work' =>  @$request->post('list-of-work') ,
            'scope_of_work'=> @implode(',',$request->post('scope-of-work')),
            
            'cost_price'=>implode(',',$request->post('price')),
            
            'markup_percent'=>implode(',',$request->post('markup-percent')),
            'markup_amount'=>implode(',',$request->post('markup-amount')),
            'margin_percent'=>implode(',',$request->post('margin-percent')),
            'discount_percent'=>implode(',',$request->post('discount-percent')), 
            'uom'=>implode(',',$request->post('quantity-input')),
             'net_price'=>  $request->post('net-sum-price') ,
         ];  
        
        
        $tofid = $request->post('list-of-work');
        $lof = DB::table('list_of_works')->where('id','=', $tofid)->get() ; 
        $desg = DB::table('designers')->where('id','=', $desid)->get() ;
        
        print "<pre>";
        $sow =   @implode(',',$request->post('scope-of-work'));
        $find = count(DB::table('interior_quotation')->whereIn('scope_of_work', array($sow))->where('list_of_work','=', $request->post('list-of-work') )->get());
        
        if($find){
            $forpdf = [
            'customer_name'=>$request->post('customer-name'),
            'date'=>$date,
            'customer_contact'=>$request->post('customer-contact'),
            'company_name'=>$companyName,
            'company_address'=>$request->post('address'),
            'company_country'=>$request->post('country'),
            'company_state'=>$request->post('state'),
            'company_zip'=>$request->post('zip-code'),
            'company_email'=>$request->post('e-mail'),
            'company_mobile'=>$request->post('mobile'), 

            'service_type'=>  $request->post('service-type-commercial') , 

            'list_of_work' =>  $lof[0]->work_name,
            'scope_of_work'=> @implode(',',$request->post('scopes_stack')),
            
            'cost_price'=>implode(',',$request->post('price')),

            'markup_percent'=>implode(',',$request->post('markup-percent')),
            'markup_amount'=>implode(',',$request->post('markup-amount')),
            'margin_percent'=>implode(',',$request->post('margin-percent')),
            'discount_percent'=>implode(',',$request->post('discount-percent')), 
            'net_price'=>  $request->post('net-sum-price') , 
            'qty'=>implode(',',$request->post('quantity-input')),

            'd_name'=> $desg[0]->name ,
            'd_email'=>$desg[0]->email,
            'd_contact'=>$desg[0]->contact,

            'type'=> 'VOI - '.date('Ymd'),

            ];
           $pdf = PDF::loadView('admin.lead.pdf-commercial',$forpdf ); 
            return $pdf->download('$service_type.time().pdftester.pdf'); 
        }
        else {
                
             $forpdf = [
            'customer_name'=>$request->post('customer-name'),
            'date'=>$date,
            'customer_contact'=>$request->post('customer-contact'),
            'company_name'=>$companyName,
            'company_address'=>$request->post('address'),
            'company_country'=>$request->post('country'),
            'company_state'=>$request->post('state'),
            'company_zip'=>$request->post('zip-code'),
            'company_email'=>$request->post('e-mail'),
            'company_mobile'=>$request->post('mobile'), 

            'service_type'=>  $request->post('service-type') , 

            'list_of_work' =>  $lof[0]->work_name,
            'scope_of_work'=> @implode(',',$request->post('scopes_stack')),
            
            'cost_price'=>implode(',',$request->post('price')),

            'net_price'=>  $request->post('net-sum-price') , 
            'qty'=>implode(',',$request->post('quantity-input')),

            'd_name'=> $desg[0]->name ,
            'd_email'=>$desg[0]->email,
            'd_contact'=>$desg[0]->contact,

            'type'=> 'Not VOI '.time(),

            ];
            echo"<pre>"; print_r($forpdf); exit();
             DB::table('interior_quotation')->insert($data);
            $pdf = PDF::loadView('admin.lead.pdf-commercial',$forpdf ); 
            return $pdf->download('$service_type.time().pdftester.pdf'); 
        }   
        
        print "<pre>";
         
        //print_r($st);
        

    }
    public function make_pdf(Request $request)
    {
        $office_showroom = $request->post('office-showroom');
        $office_phone = $request->post('office-phone');
        $office_email = $request->post('office-email');

        $customer_signature = $request->post('customer-signature');
        $customer_name = $request->post('customer-name');
        $customer_phone = $request->post('customer-contact');
        $customer_address = $request->post('customer-address');
        
        $postal_code = $request->post('postal-code');
        $contract_no = $request->post('contract-no');
        $co_reg = $request->post('co-reg-no');

        $residential_value = $request->post('residential-value'); 

        $payment_terms = $request->post('payment-terms');
        $type_of_work =  $request->post('type-of-work');
        $scope_of_work =  $request->post('scope-of-work');
        

        // DB::table('invoice_residential')->insert([
        //     'customer_name' => $customer_name,
        //      'customer_phone' => $customer_phone,
        //       'customer_address' => $customer_address,
        //        'customer_signature' => $customer_signature,
        //        'postalcode'=>$postal_code,

        //        'office_address'=>$office_showroom,
        //        'office_contact'=>$office_phone,
        //        'office_email'=>$office_email,

        //        'residential'=>$residential_value,
        //        'contract_no'=>$contract_no, 

        //        'type_of_work'=>$type_of_work,
        //        'scope_of_work'=>$scope_of_work,
        //        'payment_terms'=>$payment_terms,

        //  ]);
        // echo "data insertd";

         $data = [
             'customer_name' => $customer_name,
             'customer_phone' => $customer_phone,
              'customer_address' => $customer_address,
               'customer_signature' => $customer_signature,
               'postalcode'=>$postal_code,

               'office_address'=>$office_showroom,
               'office_contact'=>$office_phone,
               'office_email'=>$office_email,

               'residential'=>$residential_value,
               'contract_no'=>$contract_no, 
               'co_reg_no'=>$co_reg,
               'type_of_work'=>$type_of_work,
               'scope_of_work'=>$scope_of_work,
               'payment_terms'=>$payment_terms ,
               'contract_no'=>$contract_no,
               'residential_value'=>$residential_value,
         ];
        

       //return view('admin.lead.pdf_invoice');


            //view()->share('admin.lead.pdf_invoice');
            $pdf = PDF::loadView('admin.lead.pdf_invoice' , $data );
             
            return $pdf->download('invoice_residential_'.rand().'.pdf');
    }
     public function make_pdf_commercial(Request $request)
    {
        $office_showroom = $request->post('office-showroom');
        $office_phone = $request->post('office-phone');
        $office_email = $request->post('office-email');

        $customer_signature = $request->post('customer-signature');
        $customer_name = $request->post('customer-name');
        $customer_phone = $request->post('customer-contact');
        $customer_address = $request->post('customer-address');
        
        $postal_code = $request->post('postal-code');
        $contract_no = $request->post('contract-no');
        $co_reg = $request->post('co-reg-no');

        $commercial_value = $request->post('commercial-value'); 

        $payment_terms = $request->post('payment-terms');
        $type_of_work =  $request->post('type-of-work');
        $scope_of_work =  $request->post('scope-of-work'); 

         $data = [
               'customer_name' => $customer_name,
               'customer_phone' => $customer_phone,
               'customer_address' => $customer_address,
               'customer_signature' => $customer_signature,
               'postalcode'=>$postal_code,

               'office_address'=>$office_showroom,
               'office_contact'=>$office_phone,
               'office_email'=>$office_email, 
                
               'contract_no'=>$contract_no, 
               'co_reg_no'=>$co_reg,
               'type_of_work'=>$type_of_work,
               'scope_of_work'=>$scope_of_work,
               'payment_terms'=>$payment_terms ,
               'contract_no'=>$contract_no,
               'commercial_value'=>$commercial_value,
         ];
         

            //view()->share('admin.lead.pdf_invoice');
            $pdf = PDF::loadView('admin.lead.pdf_invoice_commercial' , $data );
             
            return $pdf->download('invoice_commercial_'.rand().'.pdf');
    }
     
}