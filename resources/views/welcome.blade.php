@extends('layouts.app')


@section('content')
<div>  

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <title>Voluntarily</title>
     </head>
          <body>
          <div >

          <img 
    src="images/groupe 4.png" 
    style="margin:0;
    padding:0;
position: relative;
height: 100%;
width: 100%;"
    />
    <a href="/register" style="border:none; background:none; position: relative; top:-210px; right:-950px;"><img src=" images/groupe 3.png" > </a>





                <div class="container">
                 <div class="row">

                    <div class="col">
                    <div   style="background-image: url('images/123.png'); width:349px ; height:311px">
                     <div class="input-group "  style=" position: relative; top:230px; left:100px;" >
                     <form action="/createevent">
                     <button type="submit" class="btn " style=" width:150px ; height:40px; background-color:#CB9845; color:white; font-family:Viner Hand ITC; font-size:22px;">
                                             Start
                                       </button> </form>
                  </div>
                  </div>
                  </div>
                 
                    




                    <div class="col">
                   
                    <form action="/location" method="post">
                     {{csrf_field()}}
                     <div   style="background-image: url('images/search.png'); width:349px ; height:311px">
                     <div class="input-group col-10"  style=" position: relative; top:230px; right:-30px;" >
        
                        <select  id="location" type="location" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="location" autofocus> 
                           <option value="Ariana">Ariana</option>
                           <option value="Beja">Beja</option>
                           <option value="Ben Arous">Ben Arous</option>
                           <option value="Bizerte">Bizerte</option>
                           <option value="Gabes">Gabes</option>
                           <option value="Gafsa">Gafsa</option>
                           <option value="Jendouba">Jendouba</option>
                           <option value="Kairouan">Kairouan</option>
                           <option value="Kasserine">Kasserine</option>
                           <option value="Kebili">Kebili</option>
                           <option value="Kef">Kef</option>
                           <option value="Mahdia">Mahdia</option>
                           <option value="Manouba">Manouba</option>
                           <option value="Medenine">Medenine</option>
                           <option value="Monastir">Monastir</option>
                           <option value="Nabeul">Nabeul</option>
                           <option value="Sfax">Sfax</option>
                           <option value="Sidi Bouzid">Sidi Bouzid</option>
                           <option value="Siliana">Siliana</option>
                           <option value="Sousse">Sousse</option>
                           <option value="Tataouine">Tataouine</option>
                           <option value="Tozeur">Tozeur</option>
                           <option value="Tunis">Tunis</option>
                           <option value="Zaghouan">Zaghouan</option>
                        </select>
               
                           @error('location')
                                 <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                              
                              <button type="submit"  style=" width:100px ; height:38px;border:none; background-color:#CB9845; color:white; font-family:Viner Hand ITC; border-radius: 0px 5px 5px 0px; font-size:21px;" style="margin-left:10px;">
                                             search
                                       </button>
                                       
                   
                    
                                       </div>  
                         </div>
                    </div>




                    <div class="col">
                    <img src="images/ka3ba.png" >
                    </div>
                 </div>
                </div>

<br>
<br>
<h2 class="text-center" style="margin-top:90px ; margin-bottom:50px;" >What kind of events are you looking for?</h2>


<br>

<div class="container">
 <div class="row">
 <div class="col-3" style="margin-left:-50px;" >
    <type></type>
    </div>
    <div class="col-9">
    <Event></Event>
    
    </div>
    
    
 </div>
</div>



<h2 class="text-center" style="margin-top:90px ; margin-bottom:50px;" >Our realized events</h2>

<div class="container">
 <div class="row">
    <div class="col">
    <realized></realized>
    </div>
    
 </div>
</div>

                
 

           

<br>

       
          </div>       
          
    </body>
 
</html>



@endsection
</div>
