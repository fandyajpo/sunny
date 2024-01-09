<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BarangModel;
use App\Models\AuditModel;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangController extends Controller
{
    public function Create(Request $request)
    {
        BarangModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category' => $request->category,
            'supplier' => $request->supplier,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        AuditModel::create([
            'name' => $request->name,
            'message' => "Someone is adding Barang with the name",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
    public function Update(Request $request)
    {
        $u = BarangModel::find($request->id);
        $u->name = $request->name;
        $u->description = $request->description;
        $u->price = $request->price;
        $u->stock = $request->stock;
        $u->category = $request->category;
        $u->supplier = $request->supplier;
        $u->updated_at = Carbon::now();
        $u->save();
        AuditModel::create([
            'name' => $request->name,
            'message' => "Someone is updating Barang with the name",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
    public function Delete(Request $request)
    {
        $u = BarangModel::find($request->id);
        AuditModel::create([
            'name' => $u->name,
            'message' => "Someone is remove Barang with the name",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $u->delete();
    }
    public function Summary(Request $request)
    {
        $data = BarangModel::all();
        $pdf = Pdf::loadView('pdf', compact("data"));
        return $pdf->download('invoice.pdf');
    }
}
