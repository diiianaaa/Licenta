<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Table;


class TableController extends Controller
{

    public function index()
    {
        $table = Table::latest()->get();
        return view('admin.tables.index', compact('table'));
    }



    public function TableStore(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'guest_number' => 'required',
            'status' => 'required',
            'location' => 'required',
        ], [
            'name' => 'Input Name for the Table',

        ]);

        Table::insert([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location

        ]);

        return redirect()->route('tables_index');
    }
}
