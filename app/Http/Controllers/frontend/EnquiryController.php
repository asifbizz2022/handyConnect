<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;
use Illuminate\Support\Facades\Session;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $enquiry = Enquiry::all();
          // DataTables::of($enquiry) 
          //   ->addColumn('id', function ($row) {
          //       return $row->id;
          //   })
          //   ->addColumn('email', function ($row) {
          //       return $row->email;
          //   })
          //   ->rawColumns([ 'id','email'])->make(true); 
            return view('admin.enquiry.enquiry_list', DataTables::of($enquiry));
    }

    public function send_mail(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
          
        $input = $request->all();

        // echo"<pre>"; print_r($input); exit();

         Mail::send('frontend.enquiry.enquiry_email', $input , function($message) use($request){
            $message->to($request->email)
                    ->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'))
                    ->subject('Enquiry Email');

        });

       
        // Send mail to admin
        \Mail::send('frontend.enquiry.admin_mail', array(
            'email' => $input['email'],
           ), function($message) use ($request){
            $message->from($request->email);
            $message->to('hello@handyconnect.com.sg', 'Admin')->subject('Enquiry Email');
        });

        Enquiry::create($input);

        return redirect('/')->With('success','Your Enquiry Sent Successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
