<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'order_code' => $this->order_code,
            'status' => $this->status,
            'shipping_address' => $this->shipping_address,
            'total_price' => $this->total_price,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),

            'user' => $this->user ? [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email,
            ] : null,

            'items' => $this->items->map(function ($item) {
                return [
                    'produk_id' => optional($item->produk)->id,
                    'produk_name' => optional($item->produk)->namaBarang,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->subtotal,
                ];
            }),
        ];
    }
}