<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignJobSubcontractor;
use App\Models\Order;
use App\Models\SubContractor;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Hash;


class AdminSubContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SubContractor::all();
        return view('admin.subContractor.subcontractor', $data);
    }

    public function get_all_subcontractor()
    {
        $data = SubContractor::all();
        echo json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = SubContractor::all();
        return DataTables::of($data)
            ->addColumn('sub_contractors_unique_id', function ($row) {
                return $row->sub_contractors_unique_id;
            })
            ->addColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('email', function ($row) {
                return $row->email;
            })
            ->addColumn('past_jobs', function ($row) {
                return $row->past_jobs;
            })
            ->addColumn('sub_contractors_image', function ($row) {
                if (empty($row->sub_contractors_image)) {
                    $image = "--";
                } else {
                    $image = "<img src='" . asset($row->sub_contractors_image) . "' width='40'>";
                }
                return $image;
            })
            ->addColumn('action', function ($row) {
                $action = '';
                if ('subcontractor.edit')
                    $action .= '<a class="btn btn-soft-success  btn-icon btn-circle btn-sm" href="javascript:void(0)"  data-toggle="tooltip" title="' . __('subcontractor.edit') . '" onclick="open_edit_subcontractor_model(' . $row->id . ')"> <i class="las la-edit"></i></a>';
                if ('subcontractor.delete')
                    $action .= '<a class="btn btn-soft-danger  btn-icon btn-circle btn-sm" href="javascript:void(0)" data-toggle="tooltip" title="' . __('subcontractor.delete') . '" onclick="open_delete_modal(' . $row->id . ')"> <i class="las la-trash"></i></a>';

                if ('subcontractor.view')
                    $action .= '<a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" data-toggle="tooltip" title="' . __('subcontractor.view') . '" onclick="open_view_model(' . $row->id . ')"> <i class="las la-eye"></i></a>';
                return $action;
            })
            ->rawColumns(['id', 'name', 'email', 'past_jobs', 'sub_contractors_image', 'action'])->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name'  => 'required|unique:sub_contractors,name,' . $request->id,
            'email'  => 'required|unique:sub_contractors,email,' . $request->id,
            'mobile'  => 'required|unique:sub_contractors,mobile,' . $request->id,
            'past_jobs'  => 'required',
            'past_job_cost'  => 'required',
            'sub_contractors_image'  => 'required'
        ], [
            'name.required'     => 'Please Enter  Name',
            'email.required'  => 'Please Enter Email',
            'mobile.required'  => 'Please Enter Mobile',
            'past_jobs.required'  => 'Please Enter Past job',
            'past_job_cost.required'  => 'Please Enter Past Cost',
            'sub_contractors_image.required'  => 'Please Upload Image'

        ]);

        $unique_id = SubContractor::orderBy('id', 'desc')->first();
        $number = str_replace('SC', '', $unique_id ? $unique_id->sub_contractors_unique_id  : 0);
        if ($number == 0) {
            $number = 'SC0000001';
        } else {
            $number = "SC" . sprintf("%07d", $number + 1);
        }

        $image = null;
        if ($request->hasFile('sub_contractors_image')) {
            $image = $request->sub_contractors_image->storeAs('Subcontractor_image', $request->name . date('d_M_y_s') . "." . $request->sub_contractors_image->extension());
        }

        SubContractor::create([
            'sub_contractors_unique_id' => $number,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'past_jobs' => $request->past_jobs,
            'past_job_cost' => $request->past_job_cost,
            'sub_contractors_image' => $image,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);
        echo json_encode(['status' => 'success', 'message' => ('subcontractor Add Successfully')]);
    }

    public function edit_data()
    {
        request()->validate([
            'id' => 'required|exists:sub_contractors,id'
        ]);
        $data = SubContractor::find(request()->id);
        echo json_encode($data);
    }
    
    public function edit_job()
    {
       
        request()->validate([
            'id' => 'required|exists:assign_job_subcontractors,id'
        ]);
        
        $data = DB::table('assign_job_subcontractors')
            ->join('customers','customers.customer_unique_id','assign_job_subcontractors.customer_id')
            ->join('services','services.id','assign_job_subcontractors.service_id')
            ->join('orders','orders.order_id','assign_job_subcontractors.order_id')
            ->join('sub_contractors','sub_contractors.id','assign_job_subcontractors.sub_contractor_id') 
             ->select('assign_job_subcontractors.*','assign_job_subcontractors.status as sts', 'services.service_name as scname', 
             'customers.name as customer_name','sub_contractors.name as subcontractor_name')
             ->where('assign_job_subcontractors.id',request()->id)
        ->get();
        
        echo json_encode($data);
    }




    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:sub_contractors,id',
            'name'  => 'required|unique:sub_contractors,name,' . $request->id,
            'email'  => 'required|unique:sub_contractors,email,' . $request->id,
            'mobile'  => 'required|unique:sub_contractors,mobile,' . $request->id,
            'past_jobs'  => 'required',
            'past_job_cost'  => 'required',
            // 'sub_contractors_image'  => 'required',
        ], [
            'name.required'     => 'Please Enter  Name',
            'email.required'  => 'Please Enter Email',
            'mobile.required'  => 'Please Enter Mobile',
            'past_jobs.required'  => 'Please Enter Past job',
            'past_job_cost.required'  => 'Please Enter Past Cost',
            // 'sub_contractors_image.required'  => 'Please Upload Image'

        ]);


        $old_data = SubContractor::find(request()->id);
        if ($request->hasFile('sub_contractors_image')) {
            $request->validate([
                'sub_contractors_image' => 'required'
            ]);
            File::delete($old_data->sub_contractors_image);
            $image = $request->sub_contractors_image->storeAs('Subcontractor_image', $request->name  . "." . $request->sub_contractors_image->extension());
        }
        else
        {
            $image = $request->sub_contractors_image_old;
        }

        SubContractor::where('id', request()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'past_jobs' => $request->past_jobs,
            'past_job_cost' => $request->past_job_cost,
            'sub_contractors_image' => $image,
        ]);
        echo json_encode(['status' => 'success', 'message' => __('subcontractor Update Successfully')]);
    }
    
    public function update_job(Request $request)
    {   
        // print "<pre>";
        // print_r($request->all());
          $get = DB::table('assign_job_subcontractors')->where('id',$request->id)->get(); 
            
        $request->validate([
            'id' => 'required|exists:assign_job_subcontractors,id',
            'sbcid'  => 'required' ,
            'cstid'  => 'required' , 
            'customer_order'=>'required',
            'status'=>'required',
         
        ], [
            'sbcid.required'     => 'Please Select Subcontractor',
            'cstid.required'  => 'Please Select Customer', 

        ]);

          $unique_id = DB::table('assign_job_subcontractors')->orderBy('id', 'desc')->first();

            $number = str_replace('JOB', '', $unique_id ? $unique_id->job_unique_id  : 0);
            if ($number == 0) {
                $number = 'JOB0000001';
            } else {
                $number = "JOB" . sprintf("%07d", (int)$number + 1);
            }

        $old_data = DB::table('assign_job_subcontractors')
        ->join('customers','customers.customer_unique_id','assign_job_subcontractors.customer_id')
            ->join('services','services.id','assign_job_subcontractors.service_id')
            ->join('orders','orders.order_id','assign_job_subcontractors.order_id')
            ->join('sub_contractors','sub_contractors.id','assign_job_subcontractors.sub_contractor_id') 
             ->select('assign_job_subcontractors.*','assign_job_subcontractors.status as sts', 'services.service_name as scname','services.id as sid', 
             'customers.name as customer_name','sub_contractors.name as subcontractor_name')
             ->where('assign_job_subcontractors.id',$request->id)->get();
       
         
         
        DB::table('assign_job_subcontractors')->where('id','=', $request->id)->update([
            
            'sub_contractor_id' => $request->sbcid,
            'customer_id' => $request->cstid,
            'service_id' => 1,
            'order_id' => $request->customer_order,
            'status' => $request->status,
        ]);
        echo json_encode(['status' => 'success', 'message' => __('Job Update Successfully')]);
    }



    public function delete()
    {
        
        $data = SubContractor::find(request()->id); 
        $data->delete(); 
        echo json_encode(['status' => 'success', 'message' => __('subcontractor Delete Successfully')]);
    }
    
    public function delete_job()
    { 

        $data = DB::table('assign_job_subcontractors')->where('id',request()->id)->delete(); 
         
        echo json_encode(['status' => 'success', 'message' => __('Job Delete Successfully')]);
    }


    public function assign_job()
    {
        $data = AssignJobSubcontractor::all();
        $customers = DB::table('customers')->get();
        //dd($data);
        return view('admin.subContractor.assign_job')->with([
            'data'=>$data,
            'customers'=>$customers,
            
            'orders'=>Order::all(),
            'subcontractor'=>SubContractor::all(),
            ]);
    }
    public function view_job()
    {
        $id = request()->id;
        $data = DB::table('assign_job_subcontractors')
            ->join('customers','customers.customer_unique_id','assign_job_subcontractors.customer_id')
            ->join('services','services.id','assign_job_subcontractors.service_id')
            ->join('orders','orders.order_id','assign_job_subcontractors.order_id')
            ->join('sub_contractors','sub_contractors.id','assign_job_subcontractors.sub_contractor_id') 
             ->select('assign_job_subcontractors.*','assign_job_subcontractors.status as sts', 'services.service_name as scname', 
             'customers.name as customer_name','sub_contractors.name as subcontractor_name')
             ->where('assign_job_subcontractors.id',$id)
        ->get();
         
         echo json_encode($data);
    }
    public function create_job()
    { 
         
        $data = DB::table('assign_job_subcontractors')
            ->join('customers','customers.customer_unique_id','assign_job_subcontractors.customer_id')
            ->join('services','services.id','assign_job_subcontractors.service_id')
            ->join('orders','orders.order_id','assign_job_subcontractors.order_id')
            ->join('sub_contractors','sub_contractors.id','assign_job_subcontractors.sub_contractor_id') 
             ->select('assign_job_subcontractors.*','assign_job_subcontractors.status as sts', 'services.service_name as scname', 
             'customers.name as customer_name','sub_contractors.name as subcontractor_name')
        ->get();
         
      
        return DataTables::of($data)
            ->addColumn('job_unique_id', function ($row) {
                return $row->job_unique_id;
            })
            ->addColumn('subcontractor_name', function ($row) {
                return $row->subcontractor_name;
            })
             ->addColumn('customer_name', function ($row) {
                return $row->customer_name;
            })
            ->addColumn('order_id', function ($row) {
                return $row->order_id;
            }) 
            ->addColumn('sts', function ($row) {
                return $row->sts;
            }) 
             ->addColumn('action', function ($row) {
                $action = '';
                if ('subcontractor.edit_job')
                    $action .= '<a class="btn btn-soft-success  btn-icon btn-circle btn-sm" href="javascript:void(0)"  data-toggle="tooltip" title="' . __('subcontractor.edit_job') . '" onclick="open_edit_subcontractor_model(' . $row->id . ')"> <i class="las la-edit"></i></a>';
                if ('subcontractor.delete_job')
                    $action .= '<a class="btn btn-soft-danger  btn-icon btn-circle btn-sm" href="javascript:void(0)" data-toggle="tooltip" title="' . __('subcontractor.delete_job') . '" onclick="open_delete_modal(' . $row->id . ')"> <i class="las la-trash"></i></a>';

                if ('subcontractor.view_job')
                    $action .= '<a class="btn btn-soft-info  btn-icon btn-circle btn-sm" href="javascript:void(0)" data-toggle="tooltip" title="' . __('subcontractor.view') . '" onclick="open_view_modal('.$row->id.')"> <i class="las la-eye"></i></a>';
                return $action;
            })
            ->rawColumns(['job_unique_id', 'subcontractor_name', 'customer_name', 'order_id', 'sts', 'action'])->make(true);
    }
    
    public function store_job(Request $request)
    {
        
        $request->validate([
            'subcontractor_name'  => 'required',
            'customer_name'  => 'required',
            'customer_order'  => 'required',
            
            ], [
            'subcontractor_name.required'     => 'Please Select Subcontractor',
            'customer_name.required'  => 'Please Select Customer',
            'customer_order.required'  => 'Please Select Order', 
            
        ]); 

         $unique_id = AssignJobSubcontractor::orderBy('id', 'desc')->first();

            $number = str_replace('JOB', '', $unique_id ? $unique_id->job_unique_id  : 0);
            if ($number == 0) {
                $number = 'JOB0000001';
            } else {
                $number = "JOB" . sprintf("%07d", (int)$number + 1);
            }

         
        
        $stored = DB::table('assign_job_subcontractors')->insert([
            'job_unique_id' => $number,
            'sub_contractor_id' => $request->subcontractor_name,
            'customer_id' => $request->customer_name,
            'service_id' => $request->customer_order,
            'order_id' => $request->customer_order,
            'status'    => 'Inprocess',
           
        ]);
            
        if($stored){
             echo json_encode(['status' => 'success', 'message' => ('Job Assign Successfully')]);
        }  
       
    }

    public function get_customer_order(Request $request)
    {
        $data = Order::with('Service')->where('customer_unique_id', '=', $request['customer_unique_id'])->get();
        //$data = Order::get();
        //dd($data);
        echo json_encode($data);
    }
}
