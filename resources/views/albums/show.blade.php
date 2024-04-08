@extends('layouts.app')
@section('content')
<section class="pictures p-4" style="margin-top: 10%" >
      <h6  class="mb-3 alert alert-info">>> {{$Album->name}}</h6 >      
    <div class="row">
      
          @if ($Album->pictures->count() == 0)               {{-- if there is no pictures --}}
           <div>No Pictures yet start adding some..</div>
          @endif

        @foreach ($Album->pictures as $picture)
              <div class="col-lg-2">
                <div>
                <img src="{{$picture->getMedia("images")->first()->getFullUrl() }}" class="m-2" alt="..." height="150px" width="200px">
                <h4>{{ $picture->name }}</h4>
              </div>
              </div>

        @endforeach
    </div>
</section>

<a class="btn btn-success" href="/picture/create/{{ $Album->id }}">new Picture</a>
<a href="{{ route('Album.edit', $Album) }}" class="btn btn-primary">edit album</a>

@endsection