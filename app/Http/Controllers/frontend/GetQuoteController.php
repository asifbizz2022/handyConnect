<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GetQuote;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;
use Illuminate\Support\Facades\Session;
use Illuminate\Mail\Mailable;

class GetQuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' =>['required','string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile' =>['required','string'],
        ]);
          
        $input = $request->all();

        // echo"<pre>"; print_r($input); exit();

         Mail::send('frontend.GetQuote.getquote_email', $input , function($message) use($request){
            $message->to($request->email)
                    ->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'))
                    ->subject('Get A Quote Email');

        });

         // Send mail to admin
        \Mail::send('frontend.GetQuote.admin_email',$input, function($message) use ($request){
            $message->from($request->email);
            $message->to('hello@handyconnect.com.sg', 'Admin')->subject('Get A Quote Email');
        });

        GetQuote::create($input);

        return redirect('/')->With('success','Your Quote Sent Successfully');
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
