<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     *  @param  \Illuminate\Http\Request  $request
     *  @return array
     **/
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $this->image,
            'url' => $this->url,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'stars_view' => $this->stars_view,
            'reviews_count' => $this->reviews->count(),
        ];
    }
}
