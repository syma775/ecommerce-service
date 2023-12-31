<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function brand()
    {
        return $this->hasMany(Brand::class);
    }

    public function color()
    {
        return $this->hasMany(Color::class);
    }

    public function size()
    {
        return $this->hasMany(Size::class);
    }

    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

