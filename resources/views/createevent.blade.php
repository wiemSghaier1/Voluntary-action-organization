@extends('layouts.app')
@section('content')
<body  style="background-image: url('images/Web 1366 – 2.png');">
    


<div class="container"  >
<br>
<br>
<br>
<br>
<br>
<br>
<br>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Event</div>

                <div class="card-body">
<form action="/createevent" method="post">
{{csrf_field()}}

<div class="form-group row">
 <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
        <div class="col-md-6">
          <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                @error('title')
                      <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
        </div>
</div>


<div class="form-group row">
 <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
        <div class="col-md-6">
          <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>
                @error('description')
                      <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
        </div>
</div>



<div class="form-group row">
 <label for="indate" class="col-md-4 col-form-label text-md-right">Date</label>
        <div class="col-md-6">
          <input id="indate" type="date" class="form-control @error('indate') is-invalid @enderror" name="indate" value="{{ old('indate') }}" required autocomplete="indate" autofocus>
                @error('indate')
                      <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
        </div>
</div>





<div class="form-group row">
 <label for="type" class="col-md-4 col-form-label text-md-right">Category</label>
        <div class="col-md-6">
         <select id="type" type="type" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type" autofocus>
           @foreach ($types as $type) 
           <option value="{{ $type->id }}">{{$type->type}}</option>
            @endforeach
         </select>
               
                @error('type')
                      <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                  @enderror
        </div>
</div>





<div class="form-group row">
 <label for="location" class="col-md-4 col-form-label text-md-right">Location</label>
        <div class="col-md-6">
         
           
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
        </div>
</div>


<div class="form-group row mb-0">
    <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn " style=" width:150px ; height:40px; background-color:#CB9845; color:white; font-family:Viner Hand ITC; font-size:22px;">
                   Validate
            </button>
    </div>
</div>









                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
</body>
@endsection

