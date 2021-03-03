<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{


    public function index(Request $request)
    { //if ($request->isMethod('POST'))//post
    //$this->validate($request,[
     // 'location'=>'required']);

      carbon::setlocale('eg');

      $events= Event::where('location',$request->input('location'))->get();
      foreach ($events as $event)
      {$event->setAttribute('owner',$event->user->fname);
       $event->setAttribute('gouv',$event->location);
       $event->setAttribute('type',$event->evtype->type);
       $event->setAttribute('typeim',$event->evtype->image);
       $event->setAttribute('added',Carbon::parse($event->created_at)->diffForHumans());}
      return response()->json($events); }


    public function searchlocation (Request $request)
      { 
        return  view  ('bylocation');
      }



}
