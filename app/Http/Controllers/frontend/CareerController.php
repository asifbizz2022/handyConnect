<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;
use Illuminate\Support\Facades\Session;
use Illuminate\Mail\Mailable;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.career.careers');

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
            'career_message' =>['required','string'],
            'phone' =>['required','string'],
            'career_subject' =>['required','string','max:255','subject'],
            'position' =>['required','string'],
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);

        if (!$request->has('file')) {
            return response()->json(['message' => 'Missing file'], 422);
        }
        $fileName = time().'.'.$request->file->extension();
        
        $request->file->move(public_path('Career'), $fileName);

        $input = $request->all();
        $input['file'] =env('APP_URL') .'/Career/'. $fileName;

         Mail::send('frontend.career.career_email', $input , function($message) use($request){
            $message->to(($request->email))
                    ->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'))
                    ->subject('Career Email');
         
        });

         // Send mail to admin
        \Mail::send('frontend.career.admin_email',$input, function($message) use ($request){
            $message->from($request->email);
            $message->to('hello@handyconnect.com.sg', 'Admin')->subject('Career Email');
        });

        
       
        Career::create($input);

        return redirect('careers')->with('success','Your Information Sent Successfully');

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
