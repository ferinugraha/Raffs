<?php

namespace App\Http\Controllers;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chart_options = [
            'chart_title'       => 'Pemesanan Per bulan',
            'report_type'       => 'group_by_date',
            'model'             => 'App\Models\Order',
            'group_by_field'    => 'created_at',
            'group_by_period'   => 'month',
            'chart_type'        => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);
    
        return view('pages.admin.index', compact('chart1'));
    }

    public function chart()
    {
        $chart_options = [
            'chart_title'       => 'Pemesanan Per bulan',
            'report_type'       => 'group_by_date',
            'model'             => 'App\Models\Order',
            'group_by_field'    => 'created_at',
            'group_by_period'   => 'month',
            'chart_type'        => 'line',
        ];
        $chart1 = new LaravelChart($chart_options);
    
        return view('pages.admin.index', compact('chart1'));
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
}
