<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Organization;
use App\Vacancy;
use Illuminate\Http\Request;
use App\Http\Requests\OrganizationRequest;
use App\Http\Resources\OrganizationCollection;
use App\Http\Resources\OrganizationResource;
use App\Http\Resources\UserResource;

class OrganizationController extends Controller
{   
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $this->authorize('index', Organization::class);
        $organizations = \App\Http\Resources\OrganizationCollection::make(Organization::all());
        return response()->json(['success' => true, 'data' => $organizations], 200);
    }

    public function indexStats(Request $request)
    {
        $this->authorize('indexStats', Organization::class);
        $organizations = \App\Http\Resources\UserCollection::make(User::all());
        $all = $organizations->count();
        $active = count($organizations->where('deleted_at', '=', null)->all());
        $softDelete = $all - $active;
        $organization = collect(['active' =>  $active, 'softDelete' => $softDelete, 'all' => $all]);
            return response()->json(['success' => true, 'data' => $organization], 200);

        $organizations = \App\Http\Resources\OrganizationCollection::make(User::all())->count();
        //Organization::filter($filters)->get()->count());
        return response()->json(['success' => true, $organizations], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizationRequest $request)
    {
        $this->authorize('store', Organization::class);
        $organization = Organization::create($request->all());
        return response()->json(['success' => $organization], 201);
        
    }

    
    /**
     * Display the specified resource.
     *
     * TODO: $id -> $organization
     *
     * @param  Organization  $organization
     * @param Vacancy $vacany
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Organization $organization)
    {
        //$this->authorize('show', Organization::class);
$workers = $request->get('workers');
        $organization->load(['creator', 'vacancies' => function ($query) {
            $query->withCount(['workers AS workers_booked'])->get();
        }]);


        $organization->vacancies->each(function ($value){
            if($value->workers_booked >= $value->workers_amount){
                $value->status = 'closed';
            }else{
                $value->status = 'active';
            }
        });

        $vacancies = $organization->vacancies;
        $workers = [];
        foreach ($vacancies as $vacancy) {
            array_push($workers, $vacancy->workers);
        }
        
        // $workers = ::subs()->organization()->with('vacancy')->orderBy('id', 'DESC')->get(); 
        $organization->vacancies->workers = collect($workers)->collapse()->all();
       
        return response()->json(['success' => true, 'data' => $organization], 200);
     }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
            $this->authorize('update', Organization::class);
            $organization->update($request->all());
            return response()->json(['success' => true, 'data' => $organization]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Organization $organization)
    {
            $this->authorize('delete', Organization::class);
            return response()->json(['success' => $organization->delete()], 200);
        
    }


    public function setCreator($id, $creator_id)
    {
        $organization = Organization::findOrFail($id);
        $creator = Creator::findOrFail($creator_id);
        $creator->organizations()->save($organization);
        return response()->json($organization->load('organization'), 200);
    }
}
