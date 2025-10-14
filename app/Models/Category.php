<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    Use \Illuminate\Database\Eloquent\Factories\HasFactory;
    
    protected $table ='category';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name'];
    
}
