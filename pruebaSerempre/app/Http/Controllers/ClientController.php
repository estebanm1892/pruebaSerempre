<?php

namespace App\Http\Controllers;

use App\Client;
use App\City;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $clients = Client::orderBy('id', 'ASC')
        ->search($request->name)
        ->paginate(3);
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('clients.create', compact('cities'));
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
            'name'      =>  'required|min:3',
            'city_id'   =>  'required|numeric'
        ];

        $this->validate($request, $rules);

        $client = new Client();

        $client->name    =  $request->input('name');
        $client->city_id =  $request->input('city_id');

        $client->save();

        return redirect()->route('clientes')->with('message', 'Se ha agregado el cliente correctamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::all();
        $client = Client::findOrFail($id);

        return view('clients.edit', compact('client'))
        ->with('cities', $cities);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name'      =>  'required|min:3',
            'city_id'   =>  'required|numeric'
        ];
        
        $this->validate($request, $rules);

        $client = Client::find($id);

        $client->name    =  $request->input('name');
        $client->city_id =  $request->input('city_id');

        $client->save();

        return redirect()->route('clientes')->with('message', 'Se ha actualizado el cliente correctamente.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        $client->delete();
        
        return redirect()->back()->with('message', 'Se ha eliminado el cliente correctamente.');
    }
}
