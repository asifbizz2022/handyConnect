<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScopeOfWork;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

class AdminScopeOfWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $data = ScopeOfWork::all(); 
        return view('admin.scope_of_work.scopeofwork',$data);
    }

    public function get_all_scopeofwork()
    {
        echo"<pre>";
        $data = ScopeOfWork::join('list_of_works', 'list_of_works.id', '=', 'scope_of_works.scope_id')
            ->select('scope_of_works.*', 'list_of_works.work_name as work_name')->get();
        print_r($data);
        echo json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ScopeOfWork::join('list_of_works', 'list_of_works.id', '=', 'scope_of_works.scope_id')
            ->select('scope_of_works.*', 'list_of_works.work_name as work_name')->get();
        return DataTables::of($data)
            ->addColumn('work_description', function ($row) {
                return $row->work_description;
            })
            ->addColumn('work_name', function ($row) {
                return $row->work_name;
            })
            ->addColumn('action', function ($row) {
                $action = '';
                if ('scopeofwork.edit')
                    $action .= '<a class="btn btn-soft-success  btn-icon btn-circle btn-sm" href="javascript:void(0)"  data-toggle="tooltip" title="' . __('scopeofwork.edit') . '" onclick="open_edit_scopeofwork_model(' . $row->id . ')"> <i class="las la-edit"></i></a>';
                if ('scopeofwork.delete')
                    $action .= '<a class="btn btn-soft-danger  btn-icon btn-circle btn-sm" href="javascript:void(0)" data-toggle="tooltip" title="' . __('scopeofwork.delete') . '" onclick="open_delete_modal(' . $row->id . ')"> <i class="las la-trash"></i></a>';
                return $action;
            })
            ->rawColumns([ 'work_description','work_name', 'action'])->make(true);
        
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
            
            'work_description' => 'required|unique:scope_of_works,work_description',
            'work_name' => 'required|exists:list_of_works,id',
        ], [
            'work_description.required' => 'Please Enter Work Description',
            'work_name.required' => 'Please Select Work Name',
        ]);

        ScopeOfWork::create([
            'work_description' => $request->work_description,
            'scope_id' => $request->work_name,
        ]);
        echo json_encode(['status' => 'success', 'message' => ('Scope Of Work Add Successfully')]);
    }
   
     public function edit_data()
    {
        // if (!auth()->user()->can('list_of_work.edit')) {
        //     return back()->with('unauthorized_error', 'Unauthorized action.');
        // }

        request()->validate([
            'id' => 'required|exists:scope_of_works,id'
        ]);
        $data = ScopeOfWork::find(request()->id);
        echo json_encode($data);
    }


    public function update(Request $request)
    {
        // if (!auth()->user()->can('list_of_work.edit')) {
        //     return back()->with('unauthorized_error', 'Unauthorized action.');
        // }

        $request->validate([
            'work_description' => 'required|unique:scope_of_works,work_description',
            'work_name' => 'required|exists:list_of_works,id',
        ], [
            'work_description.required' => 'Please Enter Work Description',
            'work_name.required' => 'Please Select Work Name',
        ]);

        
        $old_data = ScopeOfWork::find(request()->id);
       
        ScopeOfWork::where('id', request()->id)->update([
            
            'work_description' => $request->work_description,
            'scope_id' => $request->work_name,
        ]);
        echo json_encode(['status' => 'success', 'message' => __('Scope Of Work Update Successfully')]);

    }

    
    public function delete()
    {
        // if (!auth()->user()->can('list_of_work.delete')) {
        //     return back()->with('unauthorized_error', 'Unauthorized action.');
        // }
       
        $data = ScopeOfWork::find(request()->id);
        
        $data->delete();

        echo json_encode(['status' => 'success', 'message' => __('Scope Of Work Delete Successfully')]);
    }
}
