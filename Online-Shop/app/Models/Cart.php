<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=['cart_id','user_id','address_id','placeOn_Date','status','payment_status','deliver_Date'];
}
