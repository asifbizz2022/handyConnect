<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListOfWork;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

class AdminListOfWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ListOfWork::all(); 
        return view('admin.list_of_work.listofwork',$data);
    }

    public function get_all_listofwork()
    {
        $data = ListOfWork::all();
        echo json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ListOfWork::all();
        return DataTables::of($data)
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('work_name', function ($row) {
                return $row->work_name;
            })
            ->addColumn('scope_id', function ($row) {
                return $row->scope_id;
            })
            ->addColumn('action', function ($row) {
                $action = '';
                if ('listofwork.edit')
                    $action .= '<a class="btn btn-soft-success  btn-icon btn-circle btn-sm" href="javascript:void(0)"  data-toggle="tooltip" title="' . __('listofwork.edit') . '" onclick="open_edit_listofwork_model(' . $row->id . ')"> <i class="las la-edit"></i></a>';
                if ('listofwork.delete')
                    $action .= '<a class="btn btn-soft-danger  btn-icon btn-circle btn-sm" href="javascript:void(0)" data-toggle="tooltip" title="' . __('listofwork.delete') . '" onclick="open_delete_modal(' . $row->id . ')"> <i class="las la-trash"></i></a>';
                return $action;
            })
            ->rawColumns(['id','work_name','scope_id', 'action'])->make(true);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (!auth()->user()->can('list_of_work.add')) {
        //     return back()->with('unauthorized_error', 'Unauthorized action.');
        // }
        $request->validate([
            'work_name' => 'required|unique:list_of_works,work_name',
        ], [
            'work_name.required' => 'Please Enter Work Name'
        ]);

        ListOfWork::create([
            'work_name' => $request->work_name,
        ]);
        echo json_encode(['status' => 'success', 'message' => ('listofwork Add Successfully')]);
    }
   
     public function edit_data()
    {
        // if (!auth()->user()->can('list_of_work.edit')) {
        //     return back()->with('unauthorized_error', 'Unauthorized action.');
        // }

        request()->validate([
            'id' => 'required|exists:list_of_works,id'
        ]);
        $data = ListOfWork::find(request()->id);
        echo json_encode($data);
    }


    public function update(Request $request)
    {
        // if (!auth()->user()->can('list_of_work.edit')) {
        //     return back()->with('unauthorized_error', 'Unauthorized action.');
        // }

        $request->validate([
            'work_name' => 'required|unique:list_of_works,work_name,' . $request->id,
        ], [
            'work_name.required' => 'Please Enter List Of Work Name'
        ]);

        
        $old_data = ListOfWork::find(request()->id);
       
        ListOfWork::where('id', request()->id)->update([

            'work_name' => $request->work_name
        ]);
        echo json_encode(['status' => 'success', 'message' => __('Listofwork Update Successfully')]);

    }

    
    public function delete()
    {
        // if (!auth()->user()->can('list_of_work.delete')) {
        //     return back()->with('unauthorized_error', 'Unauthorized action.');
        // }
       
        $data = ListOfWork::find(request()->id);
        
        $data->delete();

        echo json_encode(['status' => 'success', 'message' => __('Listofwork Delete Successfully')]);
    }
}
