<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class StatusActivity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status', 'meta_data'];

    /**
     * The attributes that should be mutated to array.
     *
     * @var array
     */
    protected $casts = ['meta_data' => 'array'];


    public function statusable()
    {
        $this->morphTo();
    }


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($status) {
            $status->uuid = (string) Str::uuid(); // Create uuid when a new status is to be created
        });
    }
}
