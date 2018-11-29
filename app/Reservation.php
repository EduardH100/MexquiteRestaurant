<?php

namespace App;

use App\Client;
use App\Dish;
use App\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use softDeletes;

    const PROMOCION = 'promoción';
    const CUPON = 'cupón';
    const INVITACION = 'invitación';
    const TARJETA = 'tarjeta';
    const EFECTIVO = 'efectivo';
    const PROMOCION_EFECTIVO = 'promoción + efectivo';
    
    protected $fillable = [
    	'date',
    	'hour',
    	'clients_quantity',
    	'occasion',
        'payment',
        'details',
    	'client_id',
    	'table_id',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
}
