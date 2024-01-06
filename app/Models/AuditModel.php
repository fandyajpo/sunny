<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditModel extends Model
{
    use HasFactory;
    protected $table = 'audit';
    protected $fillable = ['name', 'message', 'created_at', 'updated_at'];
}
