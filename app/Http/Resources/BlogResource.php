<?php

namespace App\Http\Resources;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title'=>$this->title,
            'category'=> BlogCategory::whereIn('id',json_decode($this->category))->get(),
            'description'=>$this->description,
            'image'=>$this->image,
            'meta_title'=>$this->meta_title,
            'meta_description'=>$this->meta_description,
            'meta_keyword'=>$this->meta_keyword,
            'slug'=>$this->slug,
        ];
    }
}
