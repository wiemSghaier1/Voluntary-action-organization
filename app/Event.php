<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //public function gouvernement()
    //{return $this->BelongsTo('App\Gouvernement' ,'gouv_id');}

    public function evtype()
    {return $this->BelongsTo('App\Evtype', 'type_id');}

    public function user()
    {return $this->BelongsTo('App\User' , 'owner_id');}

    public function users()
    {return $this->belogsToMany('App\User');}
     
    



    
}
