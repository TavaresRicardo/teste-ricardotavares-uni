<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    function telefones(){
        return $this->hasMany('App\Telefone');
    }
}
