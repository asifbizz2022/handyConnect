<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['title'] = "Our Services";
       $data['sub_title'] = "Home";
       return view('frontend.services.service',$data);

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
    public function elctrical_services()
    {
        $data['title'] = "Electrical";
        $data['sub_title'] = "Home";
        return view('frontend.services.electricals',$data);
    }
    
    public function plumbing_services()
    {
        $data['title'] = "Plumbing";
        $data['sub_title'] = "Home";

        return view('frontend.services.plumbing',$data);
    }
    
    public function carpentry_services()
    {
        $data['title'] = "Carpentry";
        $data['sub_title'] = "Home";

        return view('frontend.services.carpentry',$data);
    }
    
    public function painting_services()
    {
        $data['title'] = "Painting";
        $data['sub_title'] = "Home";
        return view('frontend.services.painting',$data);
    }
    
    public function furniture_services()
    {
        $data['title'] = "Furniture";
        $data['sub_title'] = "Home";
        return view('frontend.services.furniture',$data);
    }

    public function door_gate_services()
    {
        $data['title'] = "Door and Gate";
        $data['sub_title'] = "Home";
        return view('frontend.services.door_gate',$data);
    }
    
    public function air_condition_services()
    {
        $data['title'] = "Painting";
        $data['sub_title'] = "Home";
        return view('frontend.services.air_condition',$data);
    }
    
    public function maintenance_repair_services()
    {
        $data['title'] = " Maintenance/Repair";
        $data['sub_title'] = "Home";
        return view('frontend.services.maintenance_repair',$data);
    }
    
    
}
