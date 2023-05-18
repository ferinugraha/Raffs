<?php
namespace App\Http\Controllers;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;


use Illuminate\Http\Request;
use App\Models\Order;

class ChartController extends Controller

{

    public function index()
    {
        $chart_options = [
            'chart_title' => 'Pemesanan Per bulan',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Order',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
        ];
        $chart1 = new LaravelChart($chart_options);
    
        return view('pages.admin.chart', compact('chart1'));
    }

   
    

}


