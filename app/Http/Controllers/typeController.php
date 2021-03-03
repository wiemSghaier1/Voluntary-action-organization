<?php

namespace App\Http\Controllers;
use App\Gouvernement;
use App\Evtype;
use App\User;
use App\Event;
use App\Event_user;

use Illuminate\Http\Request;

class typeController extends Controller
{
    public function index()
    {    
        
       //$type= Evtype::has('events')->get();
      $type= Evtype::latest()->paginate(8);;
       
       return response()->json($type);
    }
}
