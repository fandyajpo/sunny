<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;
use App\Models\SupplierModel;

class BarangModel extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = ['name', 'description', 'stock', 'price', 'category', 'supplier', 'created_at', 'updated_at'];
    public function CategoryRelationship()
    {
        return $this->belongsTo(CategoryModel::class, 'category');
    }
    public function SupplierRelationship()
    {
        return $this->belongsTo(SupplierModel::class, 'supplier');
    }
}
