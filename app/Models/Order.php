<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['shipment_id', 'customer', 'sku', 'meta_data'];

    /**
     * The attributes that should be mutated to array.
     *
     * @var array
     */
    protected $casts = ['customer' => 'array', 'sku' => 'array', 'meta_data' => 'array'];

    public function statuses(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(StatusActivity::class, 'statusable');
    }

    public function shipment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Shipment::class);
    }


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($order) {
            $order->uuid = (string) Str::uuid(); // Create uuid when a new order is to be created
        });
    }
}
