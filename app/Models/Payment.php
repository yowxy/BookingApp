<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'payments';
    protected $fillable =
    [
        'booking_id',
        'transaction_id',
        'status',
    ];

    public function booking(){
        return   $this->belongsTo(Booking::class);
    }

}
