@extends('layouts.app')
@section('content')
<form class="simpleForm" action="{{ route('Picture.store', ['album'=>$album->id]) }}" method="POST" enctype="multipart/form-data">      {{-- simple login form --}}
    @csrf  
    <h6 class="alert alert-info">Add to >> {{ $album->name }} </h6>
    <div class="mb-3">
          <label for="name" class="form-label">name </label>
          <input type="name" class="form-control" id="name" name="name" value="{{ old('name') }}">
          @error('name')
          <span class="error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">image</label>
          <input type="file" class="form-control" id="imgInp" name="image">
          <img id="preview" height="100px" width="100px" style="margin-top:5px;display:none" src="#" alt="picture preview" />          @error('image')
          <span class="error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
     
        <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
@section("scripts")
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@section("scripts")
<script src="{{ asset('js/picture-privew.js') }}" ></script>
@endsection