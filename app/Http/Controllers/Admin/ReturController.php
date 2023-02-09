<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Retur;
use DataTables;


class ReturController extends Controller
{
     public function index()
    {
        if (request()->ajax()) {
            $query = Retur::query()->with('transaction');
            return DataTables::of($query)
                ->addIndexColumn()

                ->addColumn('action', function ($data) {

                    $edit = '<a href="' . route('admin.retur.edit', $data->id) . '" class="edit btn btn-primary btn-sm">Show</a>';
                    $delete = "";

                    return $edit;
                })


                ->editColumn('status_respon', function ($data) {
                    if ($data->comment_shop == "") {
                        return '<span class="badge badge-danger">Belum</span>';
                    } else  {
                        return '<span class="badge badge-success">Sudah</span>';
                    }
                })

                ->editColumn('created_at', function ($row) {
                    return $row->created_at->diffForHumans();
                })


                //->rawColumns(['action', 'status', 'status_pengiriman'])
                ->rawColumns(['action','status_respon'])
                ->make(true);
        }

        return view('pages.admin.retur.index');
    }


     public function edit(Retur $retur)
    {
        return view('pages.admin.retur.edit', compact('retur'));
    }

    
    public function update(Request $request, Retur $retur)
    {
        // Validase the data
        $request->validate([
            'comment_shop' => 'required|string|max:255',
        ]);

        $retur->update([
                'comment_shop' => $request->input('comment_shop')
        ]);

        return redirect()->route('admin.retur.index')->with('success', 'Retur updated successfully');
    }

}
