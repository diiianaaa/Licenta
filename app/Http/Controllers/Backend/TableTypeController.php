<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableType;

class TableTypeController extends Controller
{
    public function TableIndex(){



        $type = TableType::latest()->get();
        return view('backend.table.index', compact('type'));

    }

    public function TableStore(Request $request)
    {

        $request->validate([
            'table_nb' => 'required',
            'seats_nb' => 'required',
           
        ], [
            'table_nb' => 'Input Table Number',
            'seats_nb' => 'Input number of seats for this table',
        ]);



        TableType::insert([
            'table_nb' => $request->table_nb,
            'seats_nb' => $request->seats_nb,
            
        ]);


        return redirect()->route('backend.table.index');
    }
}
