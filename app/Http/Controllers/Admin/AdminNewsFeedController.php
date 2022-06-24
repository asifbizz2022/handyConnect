<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;

class AdminNewsFeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = News::all();
        return view('admin.news.news', $data);
    }

    public function get_all_news()
    {
        $data = News::all();
        echo json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = News::all();
        return DataTables::of($data)
            ->addColumn('title', function ($row) {
                return $row->title;
            })
            ->addColumn('news_image', function ($row) {
                if (empty($row->news_image)) {
                    $image = "--";
                } else {
                    $image = "<img src='" . asset($row->news_image) . "' width='40'>";
                }
                return $image;
            })
            ->addColumn('description', function ($row) {
                return $row->description;
            })
            ->addColumn('action', function ($row) {
                $action = '';
                if ('news.edit')
                    $action .= '<a class="btn btn-soft-success  btn-icon btn-circle btn-sm" href="javascript:void(0)"  data-toggle="tooltip" title="' . __('news.edit') . '" onclick="open_edit_news_model(' . $row->id . ')"> <i class="las la-edit"></i></a>';
                if ('news.delete')
                    $action .= '<a class="btn btn-soft-danger  btn-icon btn-circle btn-sm" href="javascript:void(0)" data-toggle="tooltip" title="' . __('news.delete') . '" onclick="open_delete_modal(' . $row->id . ')"> <i class="las la-trash"></i></a>';
                return $action;
            })
            ->rawColumns(['news_image', 'title', 'description', 'action'])->make(true);
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
            'title' => 'required|unique:news,title',
            'news_image' => 'required',
            'description' => 'required'

        ], [
            'title.required' => 'Please Enter title Name',
            'news_image.required' => 'Please Enter Images',
            'description.required' => 'Please Enter Description',
        ]);

        $image = null;
        if ($request->hasFile('news_image')) {
            $image = $request->news_image->storeAs('News_images', $request->name . date('d_M_y_s') . "." . $request->news_image->extension());
        }
        News::create([
            'title' => $request->title,
            'news_image' => $image,
            'description' => $request->description,
        ]);
        echo json_encode(['status' => 'success', 'message' => ('News Add Successfully')]);
    }

    public function edit_data(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:news,id'
        ]);
        $data = News::where('id', $request->id)->get();
        echo json_encode($data);
    }


    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:news,title',
            'news_image' => 'required',
            'description' => 'required'

        ], [
            'title.required' => 'Please Enter title Name',
            'news_image.required' => 'Please Enter Images',
            'description.required' => 'Please Enter Description',
        ]);



        $old_data = News::find($request->id);
        if ($request->hasFile('news_image')) {
            $request->validate([
                'news_image' => 'required'
            ]);
            File::delete($old_data->news_image);
        }
        $image = $request->news_image->storeAs('News_images', $request->name  . date('d_M_y_s') . "." . $request->news_image->extension());
        News::where('id', $request->id)->update([
            'title' => $request->title,
            'news_image' => $image,
            'description' => $request->description,
        ]);
        echo json_encode(['status' => 'success', 'message' => __('News Update Successfully')]);
    }


    public function delete()
    {
        $data = News::find(request()->id);

        $data->delete();

        echo json_encode(['status' => 'success', 'message' => __('News Delete Successfully')]);
    }
}
