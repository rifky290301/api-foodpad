<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailRecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'thumbnail' => $this->thumbnail,
            'duration' => $this->duration,
            'description' => $this->description,
            'level' => $this->level,
            // 'author' => UserRecipeResource::collection($this->author),
            'author' => $this->author,
            'ratings' => RatingRecipeResource::collection($this->ratings),
            'steps' => StepRecipeResource::collection($this->steps),
            'ingredients' => IngredientsRecipeResource::collection($this->ingredients),
            'categories' => CategoryRecipeResource::collection($this->categories),
        ];
    }
}
