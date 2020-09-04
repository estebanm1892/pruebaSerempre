<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::orderBy('name', 'ASC')->paginate(3);
        return view('cities.index', compact('cities'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $city = City::all();
        return view('cities.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'  =>  'required|min:3'
        ];

        $this->validate($request, $rules);

        $city = new City();

        $city->name     =   $request->input('name');

        $city->save();

        return redirect()->route('ciudades')->with('message', 'Se ha agregado la ciudad correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::findOrFail($id);
        
        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);

        return view('cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name'  =>  'required|min:3'
        ];

        $this->validate($request, $rules);

        $city = City::find($id);

        $city->name     =   $request->input('name');

        $city->save();

        return redirect()->route('ciudades')->with('message', 'Se ha actualizado la ciudad correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);

        $city->delete();        

        return redirect()->back()->with('message', 'Se ha eliminado la ciudad correctamente.');
    }
}
