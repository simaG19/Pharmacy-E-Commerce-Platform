<?php

// app/Models/Product.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
      
            'image',
            'name',
            'price',
            'description',
            'type',
            'brand',
            'av',
        
    ];
}
