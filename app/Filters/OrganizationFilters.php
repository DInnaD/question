<?php

namespace App\Filters;

class OrganizationFilters extends QueryFilter
{

	public function creators($userIds)//each & all
    {
        return $this->builder->whereIn('creator_id', $this->paramToArray($userIds));
    }

    public function search($keyword)
    {
        return $this->builder->where('title', 'like', '%'.$keyword.'%');
    }

   

}//perm + api.php collection will ask   