<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class cartRes extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'cart_id'=>$this['cart_id'],
            'user_id'=>$this['user_id'],
            'address_id'=>$this['address_id'],
            'placeOn_Date'=>$this['placeOn_Date'],
            'status'=>$this['status'],
            'payment_status'=>$this['payment_status'],
            'deliver_Date'=>$this['deliver_Date'],
        ];
    }
}
