<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Organization extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $dates = ['deleted_at'];

    protected $fillable = [ 
        'title', 
        'country',
        'city',
        'creator_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    

    protected $casts = [
    ];

    protected $appends = [
         ];

    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }

    public function creator()
    {
    	return $this->belongsTo(User::class, 'creator_id');
    }

    public function vacancies()
    {
    	return $this->hasMany('App\Vacancy');
    }
    public function workers()
    {
        return $this->hasManyThrough('App\User' ,'App\Vacancy');
    }

    
    
    public function subs()
    {
        return $this->hasManyThrough('App\User', 'App\Vacancy', 'organizationmy_id', 'vacancymy_id'
            // 'App\User',
            // 'App\Vacancy',
            // 'organization_id', // Foreign key on users table...
            // 'vacancy_id', // Foreign key on posts table...
            // 'id', // Local key on countries table...
            // 'id' // Local key on users table...
        );
    }

}
