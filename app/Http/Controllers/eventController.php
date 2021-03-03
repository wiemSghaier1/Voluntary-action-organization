<?php

namespace App\Http\Controllers;
use App\Gouvernement;
use App\Evtype;
use App\User;
use App\Event;
use App\Event_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\carbon;

class eventController extends Controller
{



 public function index()
    { $eventss=Event::where('in_date','<',Carbon::now()->format('y-m-d'))->where('realised','=',0)->get();
      foreach ($eventss as $event)
       { $event->realised=1;
       $event->save();}
       carbon::setlocale('eg');
       $events= Event::where('realised','=',0)->paginate(6);
       foreach ($events as $event)
       { 
       $event->setAttribute('owner',$event->user->fname);
        $event->setAttribute('gouv',$event->location);
        $event->setAttribute('type',$event->evtype->type);
        $event->setAttribute('typeim',$event->evtype->image);
        $event->setAttribute('indate',$event->in_date);
        $event->setAttribute('added',Carbon::parse($event->created_at)->diffForHumans());}
       return response()->json($events);
    }





    public function realized()
    { 
       $events= Event::where('realised','=',1)->paginate(6);
       foreach ($events as $event)
       { 
       $event->setAttribute('owner',$event->user->fname);
        $event->setAttribute('gouv',$event->location);
        $event->setAttribute('type',$event->evtype->type);
        $event->setAttribute('typeim',$event->evtype->image);
        $event->setAttribute('indate',"in ". carbon::now()->diffInDays($event->in_date, false). " days");
        $event->setAttribute('added',Carbon::parse($event->created_at)->diffForHumans());}
       return response()->json($events);
    }





    public function allevents()
    {return view ("allevents");}




    public function partype($type)
    {carbon::setlocale('eg');
       $otype= Evtype::where('type',$type)->first();
       $events= Event::where('type_id',$otype->id)->where('realised','=',0)->get();
      
       foreach ($events as $event)
       {$event->setAttribute('owner',$event->user->fname);
        $event->setAttribute('gouv',$event->location);
        $event->setAttribute('type',$event->evtype->type);
        $event->setAttribute('typeim',$event->evtype->image);
        $event->setAttribute('added',Carbon::parse($event->created_at)->diffForHumans());}
       return response()->json($events);
    }





    public function details($id)
    {carbon::setlocale('eg');
       $event= Event::where('id',$id)->first();
       $add=Carbon::parse($event->created_at)->diffForHumans() ;
       $participants=Event_user::where('event_id','=',$id)->count();

       $particip=Event_user::where('user_id','=',Auth::User()->id)->where('event_id','=',$id)->first();
       $participate=1;
       if ($particip==NULL)
       {$participate=0;}
       $arr=Array ('id' => $id ,
       'participate'=>$participate,
       'participants'=>$participants,
        'owner'=>$event->user->fname,
         'gouv'=>$event->location, 
         'type'=>$event->evtype->type,
         'realized'=>$event->realised,  
       'typeim'=>$event->evtype->image , 
       'added'=>$add, 
       'in_date'=>$event->in_date,
       'title'=>$event->title,
       'description'=>$event->description,);
       return view ('eventdetails', $arr);
    }




    public function createevent (Request $request)
    {if ($request->isMethod('POST'))//post
      {$this->validate($request,[
        'title'=>'required|min:2',
        'description'=>'required|max:1000',
        'indate'=>'required']);

        $evnt= new Event();
        $evnt->title=$request->input('title');
        $evnt->description=$request->input('description');
        $evnt->in_date=$request->input('indate');
        $evnt->owner_id=Auth::user()->id;
        $evnt->type_id=$request->input('type');
        $evnt->location=$request->input('location');
        $evnt->save();
        return view ('welcome');
        
      }

        else //get
       {  $types= Evtype::latest()->get();
       return view ('createevent' ,['types'=>$types]);}}




    public function location(Request $request)
    { //if ($request->isMethod('POST'))//post
    //$this->validate($request,[
     // 'location'=>'required']);

      carbon::setlocale('eg');

      $events= Event::where('location',$request->input('location'))->where('realised','=',0)->get();
      foreach ($events as $event)
      {$event->setAttribute('owner',$event->user->fname);
        $event->setAttribute('gouv',$event->location);
        $event->setAttribute('type',$event->evtype->type);
        $event->setAttribute('typeim',$event->evtype->image);
        $event->setAttribute('added',Carbon::parse($event->created_at)->diffForHumans());}
        
       
       
        return view (( 'bylocation') , compact('events')); }




 public function joinevent($id)
 {
  $particip=Event_user::where('user_id','=',Auth::User()->id)->where('event_id','=',$id)->first(); 
  if ($particip==NULL)
  {$Event_user =new Event_user();
  $Event_user->user_id=Auth::User()->id;
  $Event_user->event_id=$id;
  $Event_user->save();}
  


  //affichage de la page
  carbon::setlocale('eg');
       $event= Event::where('id',$id)->first();
       $participants=Event_user::where('event_id','=',$id)->count();
       $participate=1;
       $add=Carbon::parse($event->created_at)->diffForHumans() ;
       $arr=Array ('id' => $id ,
       'participants'=>$participants,
       'participate'=>$participate,
        'owner'=>$event->user->fname,
         'gouv'=>$event->location, 
         'type'=>$event->evtype->type,
         'realized'=>$event->realised,  
       'typeim'=>$event->evtype->image , 
       'added'=>$add, 
       'in_date'=>$event->in_date,
       'title'=>$event->title,
       'description'=>$event->description,);
       return view ('eventdetails', $arr);
 }


 public function quitevent($id)
 {
  $particip=Event_user::where('user_id','=',Auth::User()->id)->where('event_id','=',$id)->first(); 
  $particip->delete();
  //affichage de la page
  carbon::setlocale('eg');
       $event= Event::where('id',$id)->first();
       $participants=Event_user::where('event_id','=',$id)->count();
       $participate=0;
       $add=Carbon::parse($event->created_at)->diffForHumans() ;
       $arr=Array ('id' => $id ,
       'participants'=>$participants,
       'participate'=>$participate,
        'owner'=>$event->user->fname,
         'gouv'=>$event->location, 
         'type'=>$event->evtype->type,
         'realized'=>$event->realised,  
       'typeim'=>$event->evtype->image , 
       'added'=>$add, 
       'in_date'=>$event->in_date,
       'title'=>$event->title,
       'description'=>$event->description,);
       return view ('eventdetails', $arr);
 }

    




      
        
}

      





