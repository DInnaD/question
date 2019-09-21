<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrganizationCollection extends ResourceCollection
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
            'success' => true,
            'data' => $this->collection,
            'vacancies' => $this->vacancies->collection,
            'workers' => $this->workers->collection,//subs
        ];
        //return parent::toArray($request);
    }
}
