<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class album extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $fillable = [
        'name',
        'cover',
        'user_id',
    ];


    public function user(){
        $this->belongsTo(User::class);
    }
    public function pictures(){
      return  $this->hasMany(picture::class);
    }
}
