<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CategoryModel;
use App\Models\AuditModel;

class CategoryController extends Controller
{
    public function Create(Request $request)
    {
        CategoryModel::create([
            'name' => $request->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        AuditModel::create([
            'name' => $request->name,
            'message' => "Somebody is adding data with the name",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
    public function Update(Request $request)
    {
        $u = CategoryModel::find($request->id);
        $u->name = $request->name;
        $u->updated_at = Carbon::now();
        $u->save();
        AuditModel::create([
            'name' => $request->name,
            'message' => "Someone is updating Category with the name",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
    public function Delete(Request $request)
    {
        $u = CategoryModel::find($request->id);
        AuditModel::create([
            'name' => $u->name,
            'message' => "Someone is remove Category with the name",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $u->delete();
    }
}
