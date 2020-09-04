<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'name', 'city_id',
    ];

    public function city()
    {
    	return $this->belongsTo('App\City');
    }    

    public function scopeSearch($query, $name){
        if(!empty($name)){
            $query = $query->whereHas('city', function($query) use ($name){
                $query->where('name', 'LIKE', "%$name%");
            });

        return $query;
        }
    }

}
