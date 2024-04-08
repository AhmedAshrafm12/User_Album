

function showDelteOptions(currentAlbumId) {                        // show deleting options
    $('.deleteOptions').animate({'left':'0'},500);
    $(this).text('cancel');
    $('.movePictures').attr('currentAlbumId',currentAlbumId);
}


$('.movePictures').click(function(){                                       // move pictures to another album
   let currentAlbumId = $(this).attr('currentAlbumId');                        // save the source album id
    $.get("/albumsList", function(data, status){
       data.forEach(album => {
         if(album.id != currentAlbumId)
        albumsList.innerHTML +=`
        <li class='m-2 '><a class='btn btn-primary  w-100' href='movePictures/${currentAlbumId}/${album.id}'>${album.name}</a></li>
        `
       });
      }).done(function(){
    $(albumsList).animate({'left':'0'},500);
    $('.deleteOptions').animate({'left':'-10%'},500);


    });
})



