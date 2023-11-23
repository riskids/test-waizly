<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'item_code';

    // Atur agar Eloquent mengelola nilai increment secara otomatis
    public $incrementing = true;
}
