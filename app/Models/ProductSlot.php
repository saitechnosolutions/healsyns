<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_date', 'order_id', 'product_id', 'quantity', 'delivery_status', 'order_delivered_time', 'deliver_person_id', 'is_cancelled', 'cancel_reason', 'created_at', 'updated_at','product_varient_id'
    ];


    public function productOrder()
    {
        return $this->belongsTo(ProductOrder::class, "order_id", "order_id");
    }

    public function order()
    {
        return $this->belongsTo(ProductOrder::class, "order_id", "order_id");
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
