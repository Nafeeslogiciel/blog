<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'User-Id'=>$this->user_id,
            'User_title'=>$this->title,
            'description'=>$this->description,
            'image_path'=>$this->image_url,
            'time_duration'=>$this->published,
            'Blog_user'=>$this->username,
            'Created_by'=>$this->created_at,
        ];
    }
}
