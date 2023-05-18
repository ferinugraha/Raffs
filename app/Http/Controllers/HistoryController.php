<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use PDF;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::where('status', 'Inactive')->latest()->get();
        return view('pages.kasir.history.index', ['order' => $order]);
    }

    public function historyadmin()
    {
        $order = Order::where('status', 'Inactive')->latest()->get();
        return view('pages.admin.history.index', ['order' => $order]);
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

    public function pendapatan()
    {
        $bulan = date('m');
        $tahun = date('Y');

        $order = Order::where('status', 'Inactive')->latest()->get();
        return view('pages.admin.pendapatan.index', ['order' => $order], compact('bulan', 'tahun'));
    }

    public function filter(Request $request)
    {
        $bulan = $request->Bulan;
        $tahun = $request->Tahun;

        $order = order::whereRaw('MONTH(created_at) = '.$bulan)->whereRaw('YEAR(created_at) = '.$tahun)->get();

	    return view('pages.admin.pendapatan.index', compact('order', 'bulan', 'tahun'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function export(Request $request ,$bulan, $tahun){

        if($bulan[1] < 10){
			$bln_tgl  = str_replace('0','',$bulan[1]);
		}else{
            $bln_tgl  = $bulan[1];
        }
        
        $array_bln    = array(1=>"Januari","Februari","Maret", "APRIL", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
		$bln          = $array_bln[date($bln_tgl)];
        
        $pdf    = order::whereRaw('MONTH(created_at) = '.$bulan)->whereRaw('YEAR(created_at) = '.$tahun)->get();

        $data   = PDF::loadview('pages.admin.pendapatan.laporanpdf', compact('pdf', 'bln', 'tahun'));

        return $data->download('laporan-pendapatan.pdf');
       
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
