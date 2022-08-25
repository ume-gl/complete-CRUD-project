<?php

namespace App\Models;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    use HasFactory;
    protected $table='products';
    protected $fillable = ['title', 'description', 'price','category','file_path'];

    public function category()
   {
    return $this->belongsTo(Category::class,);
   }
}
