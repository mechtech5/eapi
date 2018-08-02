<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'finalPrice' => bcmul($this->price, (1 - bcdiv($this->discount,100,2))),
            'rating' => $this->reviews->count() > 0 ? bcdiv($this->reviews->sum('rating'), $this->reviews->count(), 1) : 'Not Rated Yet',
            'discount' => $this->discount,
            'href' => [
                'link' => route('products.show', $this->id)
            ]
        ];
    }
}
