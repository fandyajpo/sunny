<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $fillable = ['name', 'description', 'phone', 'created_at', 'updated_at'];
}
