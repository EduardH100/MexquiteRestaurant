<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ClientReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        $mesas = Table::all();
        $cliente = Client::findorfail($client->id);
        $metodos = [Reservation::PROMOCION, Reservation::PROMOCION_EFECTIVO, 
        Reservation::EFECTIVO, Reservation::CUPON, Reservation::TARJETA, Reservation::INVITACION];
        return view('Cliente.createReservacion', compact('cliente', 'mesas','metodos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Client $client)
    {
        $cliente = Client::findorfail($client->id);
        $current_date = Carbon::today()->toDateString();
        $current_time = Carbon::now()->format('H:i');
        $current_time_end = '22:00';

        $reglas = [
            'date' =>  ['required', 'date_format:Y-m-d', "after_or_equal:$current_date"],
            'hour' =>  ['required', 'date_format:H:i', "after_or_equal:$current_time", "before:$current_time_end"],
            'clients_quantity' => 'required|min:1',
            'payment' => 'in:' . Reservation::PROMOCION . ',' . Reservation::PROMOCION_EFECTIVO . ',' . Reservation::EFECTIVO . ',' . Reservation::TARJETA . ',' . Reservation::CUPON . ',' . Reservation::INVITACION, 
            'table_id' => 'required',
        ];   

        $this->validate($request, $reglas);

        $data = $request->all();
        $mesa = Table::findorfail($data['table_id']);

        if($mesa->status == Table::MESA_RESERVADA){
            return Redirect::back()->withErrors(['error', 'La mesa ya ha sido reservada']);
        }

        if($data['clients_quantity'] > $mesa->size){
            return Redirect::back()->withErrors(['error', 'Excede el numero de personas en la mesa']);
        }

        DB::transaction(function() use ($data, $cliente, $mesa) {
            Reservation::create([
                'date' => $data['date'],
                'hour' => $data['hour'],
                'clients_quantity' => $data['clients_quantity'],
                'occasion' => $data['occasion'],
                'payment' => $data['payment'],
                'details' => $data['details'],
                'client_id' => $cliente->id,
                'table_id' => $data['table_id'],
                ]);   

            $mesa->status = Table::MESA_RESERVADA;
            $mesa->save();

        }, 5);

        return redirect()->route('clients.show', $cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client, Reservation $reservation)
    {
        $cliente = Client::findorfail($client->id);
        $reservacion = Reservation::findorfail($reservation->id);
        return view('Cliente.createReservacion', compact('cliente','reservacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client, Reservation $reservation)
    {
        $client->reservations()->find($reservation->id)->delete();
        return redirect()->route('clients.show', $client->id);
    }
}
