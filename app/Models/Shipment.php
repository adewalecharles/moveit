<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Shipment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['meta_data'];

    /**
     * The attributes that should be mutated to array.
     *
     * @var array
     */
    protected $casts = ['meta_data' => 'array'];

    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function statuses(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(StatusActivity::class, 'statusable');
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        //static::addGlobalScope(new ActiveScope);
        static::creating(function ($shipment) {
            $shipment->uuid = (string) Str::uuid(); // Create uuid when a new shipment is to be created
        });
    }

}
