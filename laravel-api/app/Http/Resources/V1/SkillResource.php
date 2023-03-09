<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
{
    /**
     * 
     * php artisan make:resource V1/SkillResource
     * we will show only id, name and slug but not timestamp; 
     *
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'name'=>$this->name,
            'slug'=>$this->slug,
            // 'slug'=>route('skills.show', $this->slug),
        ];
    }
}
