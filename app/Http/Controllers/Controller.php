<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\BarangModel;
use App\Models\CategoryModel;
use App\Models\SupplierModel;
use App\Models\AuditModel;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function CategoryPage()
    {
        $data = CategoryModel::all();
        return view("category", compact("data"));
    }
    public function SupplierPage()
    {
        $data = SupplierModel::all();
        return view("supplier", compact("data"));
    }
    public function BarangPage()
    {
        $data = BarangModel::with('CategoryRelationship', 'SupplierRelationship')->get();
        $category = CategoryModel::all();
        $supplier = SupplierModel::all();
        return view("index", compact("data", "category", "supplier"));
    }
    public function AuditPage()
    {
        $data = AuditModel::all();
        return view("audit", compact("data"));
    }
}
