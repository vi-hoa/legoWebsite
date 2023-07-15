<?php

namespace App\Models;

use App\Models\Color;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    //use SoftDeletes;

    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class);
    }
}
