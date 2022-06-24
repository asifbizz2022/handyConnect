<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminOrderController extends Controller
{
     
    public function index()
    {
        $scope = DB::table('scope_of_works')->get();
        $list = DB::table('list_of_works')->get();

        $orders = DB::table('orders')
        ->join('services','services.id','=','orders.service_unique_id') 
        ->join('interior_quotation','interior_quotation.quotation_number', 'orders.quotation_unique_id')
        ->join('customers','customers.customer_unique_id', 'orders.customer_unique_id')
        ->join('status','status.order_status', 'orders.order_status')
        ->get();
         
        return view('admin.orders.user-orders')->with([
            'scope'=>$scope,
            'list'=>$list,
            'orders'=>$orders,
        ]);
        
    }

    
    public function status($status)
    {
        $orders = DB::table('orders')
        ->join('services','services.id','=','orders.service_unique_id') 
        ->join('interior_quotation','interior_quotation.quotation_number', 'orders.quotation_unique_id')
        ->join('customers','customers.customer_unique_id', 'orders.customer_unique_id')
        ->where('order_status','=',$status)->get(); 

        echo json_encode($orders);
    }
 
    public function store(Request $request)
    {
         
    }

     
    public function approve($id)
    {
        $data = [
            'order_status'=> 1,
        ];
        $update = DB::table('orders')->where('order_id','=', $id)->update($data);
        if($update){
            return true;
        } else {
            return false;
        }
         
    }

    public function deapprove($id)
    {
        $data = [
            'order_status'=> 4,
        ];
        $update = DB::table('orders')->where('order_id','=', $id)->update($data);
        if($update){
            return true;
        } else {
            return false;
        }
         
    }
 
    public function edit($id)
    {
        //
    }

    
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
