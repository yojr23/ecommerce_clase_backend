<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    Use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table ='products';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['name','description','price','original_price','image_url','brand','stock','rating','reviews_count','category_id'];
    

}
