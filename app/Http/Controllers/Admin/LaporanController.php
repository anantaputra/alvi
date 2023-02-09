<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Nette\Utils\Json;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.laporan.index');
    }

    
    public function store(Request $request)
    {

        $start=$request->par1;
        $end=$request->par2;
        
        $transaction = Transaction::where('status', 'success')->whereBetween('created_at', [$start, $end])->get();

        $pdf = PDF::loadview('pages.admin.laporan.cetak',compact('transaction', 'start','end'));
        return $pdf->download('laporan-cetak.pdf');
    }
    

}
