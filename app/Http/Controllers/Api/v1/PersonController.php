<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{
    /**
     * @param Person $person
     * @return PersonResource
     */
    public function show(Person $person):PersonResource
    {
        return new PersonResource($person);
    }

    /**
     * @param Person $person
     * @return PersonResourceCollection
     */
    public function index(Person $person):PersonResourceCollection
    {
        return new PersonResourceCollection( Person::paginate());
    }

    /**
     * @param Request $request
     * @return PersonResource
     */
    public function store(Request $request)
    {
        // create that person
        $request->validate([
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'email'         =>  'required',
            'phone'         =>  'required',
            'city'          =>  'required',
        ]);
        $person=Person::create($request->all());

        return new PersonResource($person);
    }

    /**
     * @param Person $person
     * @param Request $request
     * @return PersonResource
     */
    public function update(Person $person,Request $request):PersonResource{
        //update our person
        $person->update($request->all());
        return new PersonResource($person);
    }
    public function destroy(Person $person){
        $person->delete();
        return response()->json();
    }
}
