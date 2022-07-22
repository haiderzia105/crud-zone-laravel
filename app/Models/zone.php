<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    // protected $table = 'crudy';
    protected $fillable = ['name', 'price','image','created_at','updated_at'];
    use HasFactory;
}
