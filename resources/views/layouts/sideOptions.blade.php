@if($albums->count() > 0)
<ul class="deleteOptions" >
    <li><a href="/deleteAll/{{ $album->id }}" class="btn btn-danger">delete all pictures</a></li><br>
  @if($albums->count() > 1)
  <li><button   class="btn btn-primary movePictures">move picures to another album</button></li>
  @endif
  </ul>
  @endif