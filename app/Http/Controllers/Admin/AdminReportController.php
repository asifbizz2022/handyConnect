<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index($date = null)
    {
        $default_start_date = (isset($date) ? $date['start_date'] : date('Y-m-d', strtotime('-6 days')));
        $end_date = (isset($date) ? $date['end_date'] : date('Y-m-d'));
        $start_date = $default_start_date;
    
        while (strtotime($start_date) <= strtotime($end_date)) {
            $data[$start_date] = Order::with('Service')
            ->whereDate('created_at', '=', $start_date)
            ->where('order_status', '=', 4)
            ->get();
            $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
        }
        foreach($data as $key => $val) {
            $price = 0;
            $num_service = 0;
            foreach ($val as $value) {
                $price += $value['Service']['price'];
                $num_service++;
            }
            $reports[$key] = ['date'=>$key,'total_sales_amount'=>$price,'total_num_service'=>$num_service];
        }
        $date = ['start_date'=>$default_start_date,'end_date'=>$end_date];
        //dd($date); 
        
        return view('admin.report.sales_report',compact('reports','date'));
    }
    public function salesReport(Request $request)
    {
        $date = [
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date']
        ];
        return $this->index($date);
    }

    public function order_report_index($date = null)
    {
        $default_start_date = (isset($date) ? $date['start_date'] : date('Y-m-d', strtotime('-6 days')));
        $end_date = (isset($date) ? $date['end_date'] : date('Y-m-d'));
        $start_date = $default_start_date;
    
        $reports = Order::with('Service','Customer','Status')
            ->whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->where('order_status', '=', 4)
            ->get();
        //dd($reports);    

        // while (strtotime($start_date) <= strtotime($end_date)) {
        //     $data[$start_date] = Order::with('Service','Customer')
        //     ->whereDate('created_at', '=', $start_date)
        //     ->where('order_status', '=', 4)
        //     ->get();
        //     $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
        // }
        // foreach($data as $key => $val) {
        //     $price = 0;
        //     $num_service = 0;
        //     foreach ($val as $value) {
        //         $price += $value['Service']['price'];
        //         $num_service++;
        //     }
        //     $reports[$key] = ['date'=>$key,'total_sales_amount'=>$price,'total_num_service'=>$num_service];
        // }
        $date = ['start_date'=>$default_start_date,'end_date'=>$end_date];
        //dd($reports); 
        
        return view('admin.report.order_report',compact('reports','date'));
    }
    public function orderReport(Request $request)
    {
        $date = [
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date']
        ];
        return $this->order_report_index($date);
    }
}
