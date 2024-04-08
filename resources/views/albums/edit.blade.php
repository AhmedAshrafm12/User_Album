@extends('layouts.app')
@section('content')
<form class="simpleForm" action="{{ route('Album.update', $album) }}" method="POST" enctype="multipart/form-data">      {{-- simple login form --}}
    @csrf  
    @method('PATCH')
    <div class="mb-3">
          <label for="name" class="form-label">name </label>
          <input type="name" class="form-control" id="name" name="name" value="{{ $album->name }}">

          {{-- get error massage --}}
            @error('name')
          <span class="error" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">cover</label>
          <input type="file" class="form-control" id="imgInp" name="cover">
          <img id="preview" height="100px" width="100px" style="margin-top:5px;" src="{{$album->getMedia("images")->first()->getFullUrl() }}" alt="picture preview" />
        </div>
     
        <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
@section("scripts")
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@section("scripts")
<script src="{{ asset('js/picture-privew.js') }}" ></script>
@endsection