<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\SupplierModel;
use App\Models\AuditModel;

class SupplierController extends Controller
{
    public function Create(Request $request)
    {
        SupplierModel::create([
            'name' => $request->name,
            'description' => $request->description,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        AuditModel::create([
            'name' => $request->name,
            'message' => "Someone is adding Supplier with the name",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
    public function Update(Request $request)
    {
        $u = SupplierModel::find($request->id);
        $u->name = $request->name;
        $u->description = $request->description;
        $u->phone = $request->phone;
        $u->updated_at = Carbon::now();
        $u->save();
        AuditModel::create([
            'name' => $request->name,
            'message' => "Someone is updating Supplier with the name",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
    public function Delete(Request $request)
    {
        $u = SupplierModel::find($request->id);
        AuditModel::create([
            'name' => $u->name,
            'message' => "Someone is updating Supplier with the name",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        SupplierModel::find($u->id)->delete();
    }
}
