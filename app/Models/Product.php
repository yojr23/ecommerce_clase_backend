<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='category';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name'];
}
