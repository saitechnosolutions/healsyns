<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;

    protected $fillable =  ["order_id", "date_ordered_on", "delivery_person_id", "is_delivery_assigned", "user_id", "payment_status", "current_status", "is_cancelled", "reason_for_cancel", "created_at", "updated_at","total_amount","gst_amount","discount_amount","grand_total_amount","delivery_charge"];




    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "user_id");
    }



    public function area()
    {
        return $this->customer->area();
    }

    public function transactionLog()
    {
        return $this->hasOne(ProductTransactionLog::class, "order_id", "order_id");
    }

    public function getDateOrderedOnAttribute($value)
    {

        return Carbon::parse($value)->format('d-M-Y');
    }


    public function orderAddress(): HasOne
    {
        return $this->hasOne(ProductOrderUserAddress::class, "order_id", "order_id");
    }
}
