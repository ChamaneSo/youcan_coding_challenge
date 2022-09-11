<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function parent(){
        return $this->belongsTo(Category::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class , 'products_categories');
    }
}
