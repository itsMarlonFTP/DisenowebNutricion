<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'userID',
        'plan_type',
        'requirements',
        'status',
        'price',
        'delivery_photo',
        'route_photo',
        'delivered_at',
        'cancelled_at'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'delivered_at' => 'datetime',
        'cancelled_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'userID');
    }
} 