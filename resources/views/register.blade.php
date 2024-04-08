@extends('layouts.app')
@section('content')
    
<form class="simpleForm" action="register" method="post">      {{-- simple login form --}}
    @csrf
  <h2 class="mb-3">create new account</h2>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" >
        @error('email')
        <span class="error" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>



    <div class="mb-3">
        <label for="userName" class="form-label">userName </label>
        <input type="userName" class="form-control" id="userName" name="userName" value="{{ old('userName') }}">

         {{-- get error massage --}}
            @error('userName')
                  <span class="error" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
            @enderror
      </div>



      <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    
               {{-- get error massage --}}
                  @error('password')
                    <span class="error" role="alert">
                          <strong>{{ $message }}</strong>
                    </span>
                  @enderror
      </div>
   
      <button type="submit" class="btn btn-primary">sign Up</button>
      <a href="/">have account</a>

</form>


@endsection