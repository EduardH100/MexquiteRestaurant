<?php

namespace App\Http\Controllers\Client;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Client::paginate(15);
        return view('Cliente.indexClientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cliente.formCliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
          'name' => 'required',
          'email' => 'required|email|unique:clients',
        );
        
        //dd($request);

        $this->validate($request, $rules);
        $data = $request->all();
        
        $cliente = Client::create($data);

        return redirect()->route('clients.show', $cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $cliente = Client::findorfail($client->id);
        $reservaciones = $cliente->reservations()->orderBy('id', 'desc')->paginate(10);
        return view('Cliente.showCliente', compact('cliente','reservaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $cliente = Client::findorfail($client->id);
        return view('Cliente.formCliente', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $rules = array(
          'name' => 'min:3',
          'email' => 'email',
        );
        
        $this->validate($request, $rules);

        Client::where('id', $client->id)->update($request->except('_token', '_method'));
        $cliente = Client::find($client->id);

        return redirect()->route('clients.show', $cliente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}
