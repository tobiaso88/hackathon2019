<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    public function stateRelation()
    {
        return $this->hasOne(State::class, 'abbreviation', 'state');
    }
}
