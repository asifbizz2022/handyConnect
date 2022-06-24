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
     
    public function index()
    {
    
    }

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
           // echo"<pre>";  print_r($request->all());exit();
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


        $qc = Quotation::create([
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
        
         $forpdf = [
            
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
            
        ];
         $pdf = PDF::loadView('admin.quotation.pdf' , $forpdf ); 
         
         // echo "<pre>"; print_r($forpdf); exit();

     
         if($qc){
                echo json_encode(['status' => 'success', 'message' => 'Quotation Save Successfully', 'url' => URL::signedRoute('admin.quotation_list', $request->id)]);

                // $pdf = PDF::loadView('admin.lead.pdf-residential'  ); 
                // return $pdf->download(time().'.pdf'); 
         }   

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
                    return '<span class="badge badge-inline badge-success">Approve</span>';
                else
                    return '<span class="badge badge-inline badge-danger">Not Approve</span>';
            })
            ->addColumn('action', function ($row) {
                $user = User::find(Auth::user()->id);
                $role = Role::where('name', $user->getRoleNames())->first();
                $action = '';
                if ($role->name == 'Admin') {
                    $action .= '<a class="btn btn-soft-success  btn-icon btn-circle btn-sm" href="javascript:void(0)"  data-toggle="tooltip" title="Add Platform Fee" onclick="open_platform_modal(' . $row->final_price_with_tax . ',' . $row->id . ')"> <i class="las la-eye"></i></a>';
                    $action .= '<a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)"  data-toggle="tooltip" title="Approve" onclick="open_approve_modal(' . $row->id . ',' . $row->lead_id . ')"> <i class="las fa-check"></i></a>';
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

        echo json_encode(['status' => 'success', 'message' => 'Approve Successfully']);
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
        $companies = DB::table('companies')->get();
        $designers = DB::table('designers')->get();
        return view('admin.lead.works')
        ->with('work', $work_item)
        ->with('scope',$scope)
        ->with('residential', $residential)
        ->with('commercial',$commercial)
        ->with('designers', $designers)
        ->with('companies',$companies);
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
    public function invoice_2commercial(Request $request){
        print "<pre>"; 
         print_r($request->post());
         $desid = $request->post('designers');
            $des_name = DB::table('designers')->where('id','=',$desid)->get();
            print_r($des_name);
            echo $des_name[0]->name;
    }

    public function invoice_residential(Request $request)
    {
        print "<pre>"; 
       
        $type ='VOI-'.time()    ;
        $date = date('d-m-Y');
        $l = implode('-',$request->post('units_stack'));
        $m = explode('-',$l);
        $listOfWork = DB::table('list_of_works')->select('work_name')->distinct()
        ->whereIn('id',$m)
        ->get();
         $companies =DB::table('companies')->select('name','logo','bank_account_no','uen_no')
                    ->where('id' , '=' ,$request->post('company-name'))
                    ->get();
                    


                    
       $designer = DB::table('designers')->select('name','email')->where('id','=',$request->post('designers'))->get();

        $quotation_number= "Q-C" .random_int(100000, 999999);
        $company_reg_num=date('Ymd')."M";
         

        DB::table('scope_of_works')->update(['token'=>0]);
        DB::table('list_of_works')->update(['token'=>0]);
        DB::table('sow')->truncate();

        print "<pre>";
        $a = implode('-',$request->post('scopes_stack'));
        $b = explode('-',$a); 
        $cost_a = implode('-',$request->post('grand-total'));
        $cost_b = explode('-',$cost_a);
       

        $id = DB::table('scope_of_works')->select('id')->whereIn('id',$b)->get();
        $list_map = DB::table('scope_of_works')->select('scope_id','work_description')->whereIn('id',$b)->get();
        $scope_id = DB::table('scope_of_works')->select('scope_id')->distinct()->whereIn('id',$b)->get();
        

        foreach($scope_id as $token){
        
        DB::table('list_of_works')->where('id','=',$token->scope_id)->update([
                'token'=> 1,

        ]); 
         echo $token->scope_id;
        
       }   
     
        DB::table('scope_of_works')->whereIn('id',$b)->update([
                'token'=> 1,
                
        ]); 
        
        for ($id_tbl=0; $id_tbl < count($request->post('scopes_stack')) ; $id_tbl++) { 
            echo  $id_tbl.'<br>';
            DB::table('sow')->insert([
                 
                'sc_id'=>$b[$id_tbl] , 
                'cost'=>$cost_b[$id_tbl],
            ]);
        } 
         $data_insert = [
        'pdf_banner_img'=>'pdf/pdf.jpg',
        'quotation_number'=>$quotation_number,
        'co_reg_no'=>$company_reg_num,
        'customer_name'=>$request->post('customer-name'),
        'date'=>$date,
        'customer_contact'=>$request->post('customer-contact'),
        'company_name'=>$companies,
        'company_address'=>$request->post('address'),
        'company_country'=>$request->post('country'),
        'company_state'=>$request->post('state'),
        'company_zip'=>$request->post('zip-code'),
        'company_email'=>$request->post('e-mail'),
        'company_mobile'=>$request->post('mobile'),

        'list_of_work' => $listOfWork,
        'designers'=> $designer,
        'type'=> $type,
        'service_type'=>$request->post('service-type-residential'),
        'scope_of_work'=> @implode('-',$request->post('scope_name')),
        'unit'=> @implode('-',$request->post('unit')),
        'cost_price'=> @implode('-',$request->post('cost-price')),
        'price_per_unit'=> @implode('-',$request->post('price-per-unit')),
        'unit_of_measure'=> @implode('-',$request->post('unit-of-measure')),
        'grand_total'=> @implode('-',$request->post('grand-total')),

        'discount'=>$request->post('discount'),
        'margin'=> $request->post('margin'),
        'net_price'=>$request->post('net-price'),
        'tax'=> $request->post('tax'),
        'final_grand_total'=> $request->post('net-sum-price'),
        ];

         DB::table('interior_quotation')->insert($data_insert);

        $data = [
        'pdf_banner_img'=>'pdf/pdf.jpg',
        'quotation_number'=>$quotation_number,
        'co_reg_no'=>$company_reg_num,
        'customer_name'=>$request->post('customer-name'),
        'date'=>date('m-d-Y'),
        
        'customer_contact'=>$request->post('customer-contact'),
        'company_name'=>$companies,
        'title'=> DB::table('list_of_works')->where('token','=',1)->get(),
        'scope'=> DB::table('scope_of_works')->join('sow','sow.sc_id','=','scope_of_works.id')->where('token','=',1)->get(),
        'cost'=> DB::table('sow')->get(),
        'company_address'=>$request->post('address'),
        'company_country'=>$request->post('country'),
        'company_state'=>$request->post('state'),
        'company_zip'=>$request->post('zip-code'),
        'company_email'=>$request->post('e-mail'),
        'company_mobile'=>$request->post('mobile'),

        'designers'=> $designer,
        // 'type'=> $type,
        'service_type'=>$request->post('service-type-residential'),
        'unit'=> @implode('-',$request->post('unit')),
        
       
        'price_per_unit'=> @implode('-',$request->post('price-per-unit')),
        'unit_of_measure'=> @implode('-',$request->post('unit-of-measure')),
        'grand_total'=> @implode('-',$request->post('grand-total')),

        'discount'=>$request->post('discount'),
        'margin'=> $request->post('margin'),
        'net_price'=>$request->post('net_price'),
        'tax'=> $request->post('tax'),
        'final_grand_total'=> $request->post('final_grand_total'),
            
         ];
       

      ob_clean();
 
        $pdf = PDF::loadView('admin.lead.pdf-residential',$data); 
         return $pdf->download('I_R_Q_'.time().'.pdf'); 

    }

    public function invoice_commercial(Request $request)
    {
        print "<pre>"; 
       
        $type ='VOI-'.time()    ;
        $date = date('d-m-Y');
        $l = implode('-',$request->post('units_stack'));
        $m = explode('-',$l);
        $listOfWork = DB::table('list_of_works')->select('work_name')->distinct()
        ->whereIn('id',$m)
        ->get();
          $companies =DB::table('companies')->select('name','logo','bank_account_no','uen_no')
                    ->where('id' , '=' ,$request->post('company-name'))
                    ->get();
                    
       $designer = DB::table('designers')->select('name','email')->where('id','=',$request->post('designers'))->get();

        $quotation_number= "Q-C" .random_int(100000, 999999);
        $company_reg_num=date('Ymd')."M";
         

        DB::table('scope_of_works')->update(['token'=>0]);
        DB::table('list_of_works')->update(['token'=>0]);
        DB::table('sow')->truncate();

        print "<pre>";
        $a = implode('-',$request->post('scopes_stack'));
        $b = explode('-',$a); 
        $cost_a = implode('-',$request->post('unit'));
        $cost_b = explode('-',$cost_a);
       

        $id = DB::table('scope_of_works')->select('id')->whereIn('id',$b)->get();
        $list_map = DB::table('scope_of_works')->select('scope_id','work_description')->whereIn('id',$b)->get();
        $scope_id = DB::table('scope_of_works')->select('scope_id')->distinct()->whereIn('id',$b)->get();
        

        foreach($scope_id as $token){
        
        DB::table('list_of_works')->where('id','=',$token->scope_id)->update([
                'token'=> 1,

        ]); 
         echo $token->scope_id;
        
       }   
     
        DB::table('scope_of_works')->whereIn('id',$b)->update([
                'token'=> 1,
                
        ]); 
        
        for ($id_tbl=0; $id_tbl < count($request->post('scopes_stack')) ; $id_tbl++) { 
            echo  $id_tbl.'<br>';
            DB::table('sow')->insert([
                 
                'sc_id'=>$b[$id_tbl] , 
                'cost'=>$cost_b[$id_tbl],
            ]);
        } 
         $data_insert = [
         'pdf_banner_img'=>'pdf/pdf.jpg',
        'quotation_number'=>$quotation_number,
        'co_reg_no'=>$company_reg_num,
        'customer_name'=>$request->post('customer-name'),
        'date'=>$date,
        'customer_contact'=>$request->post('customer-contact'),
        'company_name'=>$companies,
        'company_address'=>$request->post('address'),
        'company_country'=>$request->post('country'),
        'company_state'=>$request->post('state'),
        'company_zip'=>$request->post('zip-code'),
        'company_email'=>$request->post('e-mail'),
        'company_mobile'=>$request->post('mobile'),

        'list_of_work' => $listOfWork,
        'designers'=> $designer,
        'type'=> $type,
        'service_type'=>$request->post('service-type-commercial'),
        'scope_of_work'=> @implode('-',$request->post('scope_name')),
        'unit'=> @implode('-',$request->post('unit')),
        'cost_price'=> @implode('-',$request->post('cost-price')),
        'price_per_unit'=> @implode('-',$request->post('price-per-unit')),
        'unit_of_measure'=> @implode('-',$request->post('unit-of-measure')),
        'grand_total'=> @implode('-',$request->post('grand-total')),

        'discount'=>$request->post('discount'),
        'margin'=> $request->post('margin'),
        'net_price'=>$request->post('net-price'),
        'tax'=> $request->post('tax'),
        'final_grand_total'=> $request->post('net-sum-price'),
        ];

         DB::table('interior_quotation')->insert($data_insert);


        $data = [
        'pdf_banner_img'=>'pdf/pdf.jpg',
        'quotation_number'=>$quotation_number,
        'co_reg_no'=>$company_reg_num,
        'customer_name'=>$request->post('customer-name'),
        'date'=>date('m-d-Y'),
        
        'customer_contact'=>$request->post('customer-contact'),
        'company_name'=>$companies,
        'title'=> DB::table('list_of_works')->where('token','=',1)->get(),
        'scope'=> DB::table('scope_of_works')->join('sow','sow.sc_id','=','scope_of_works.id')->where('token','=',1)->get(),
        'cost'=> DB::table('sow')->get(),
        'company_address'=>$request->post('address'),
        'company_country'=>$request->post('country'),
        'company_state'=>$request->post('state'),
        'company_zip'=>$request->post('zip-code'),
        'company_email'=>$request->post('e-mail'),
        'company_mobile'=>$request->post('mobile'),

        'designers'=> $designer,
        // 'type'=> $type,
        'service_type'=>$request->post('service-type-commercial'),
        'unit'=> @implode('-',$request->post('unit')),
        
       
        'price_per_unit'=> @implode('-',$request->post('price-per-unit')),
        'unit_of_measure'=> @implode('-',$request->post('unit-of-measure')),
        'grand_total'=> @implode('-',$request->post('grand-total')),

        'discount'=>$request->post('discount'),
        'margin'=> $request->post('margin'),
        'net_price'=>$request->post('net_price'),
        'tax'=> $request->post('tax'),
        'final_grand_total'=> $request->post('final_grand_total'),
            
         ];
         
       
      ob_clean();
 
        $pdf = PDF::loadView('admin.lead.pdf-residential',$data); 
         return $pdf->download('I_R_Q_'.time().'.pdf'); 

        
       
        
 
    }
     /*public function invoice_commercial(Request $request)
    {     
        print "<pre>";
        $type ='VOI-'.time();
        $companyName = $request->post('company-name').'-'.time();
        $date = date('d-m-Y');
        $l = implode('-',$request->post('units_stack'));
        $m = explode('-',$l);
        $listOfWork = DB::table('list_of_works')->select('work_name')->distinct()
        ->whereIn('id',$m)
        ->get();

        $designer = DB::table('designers')->where('id','=',$request->post('designers'))->get();
        // $join = DB::table('scope_of_works')->distinct()
        // ->join('scope_of_works','scope_of_works.scope_id','=','list_of_works.id')->get();

        // print_r($join);
        // $s = DB::table('scope_of_works')->whereIn('id','=', $request->post('scope-of-work'))->get();
        // $sow = DB::table('scope_of_works')->whereIn()->get();
        // $find = count(DB::table('interior_quotation')->whereIn('scope_of_work', array($sow))->where('list_of_work','=', $request->post('list-of-work') )->get());
        // if($find){
        //     $type = "VOI-".time();
        // } else {
        //     $type = "NOT VOI".time();
        // }
        $data = [
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

        'list' => $listOfWork,
        'designers'=> $designer,
        'type'=> $type,
        'service_type'=>$request->post('service-type-residential'),
        'scopes'=> @implode('-',$request->post('scope_name')),
        'unit'=> @implode('-',$request->post('unit')),
        'cost-price'=> @implode('-',$request->post('cost-price')),
        'price_per_unit'=> @implode('-',$request->post('price-per-unit')),
        'unit_of_measure'=> @implode('-',$request->post('unit-of-measure')),
        'grand_total'=> @implode('-',$request->post('grand-total')),

        'discount'=>$request->post('discount'),
        'margin'=> $request->post('margin'),
        'net_price'=>$request->post('net-price'),
        'tax'=> $request->post('tax'),
        'final_grand_total'=> $request->post('net-sum-price'),
        ];

             // echo"<pre>"; print_r($forpdf); exit();
             DB::table('interior_quotation')->insert($data);
        // $scopes = implode('-', $request->post('scope_name'));
        // echo $scopes;
        // $pdf = PDF::loadView('admin.lead.pdf-commercial',$forpdf ); 
        // return $pdf->download('I_C_Q_'.time().'.pdf'); 
        
        print_r($listOfWork);
    }
*/
   
}