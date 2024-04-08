@extends('layouts.app')
@section('content')
<form class="simpleForm" action="login" method="post">      {{-- simple login form --}}
  @csrf  
  <h2 class="mb-3">login to start</h2>
  <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">

         {{-- get error massage --}}
              @error('email')    
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
   
      <button type="submit" class="btn btn-primary">login</button>
      <a href="/register">or create new account</a>
</form>


@endsection