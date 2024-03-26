<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;
    protected $table = "productstocks";
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function Productvarient()
    {
        return $this->belongsTo(ProductVarient::class, 'id');
    }
}
