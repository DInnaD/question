<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Organization extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title'  => $this->title, 
            'country' => $this->country,
            'city' => $this->city,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'creator' => new User($this->creator),
            // 'workers' => User::load(['vacancies', function ($query){
            //     $query->all();
            // }]),
        ]; 
        
    
}
