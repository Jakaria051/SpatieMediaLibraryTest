<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable,InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function registerMediaCollections(): void
    {
    $this->addMediaCollection('avatar')
    //to upload jpg/png image
      ->acceptsFile(function (File $file) {
        return $file->mimeType === 'image/jpeg';
    })

    ///coverting  image & multiple image
    ->registerMediaConversions(function (Media $media){
        $this->addMediaConversion('card')
        ->width(368)
        ->height(232)
        ->sharpen(10);

        //for avatar
        $this->addMediaConversion('thumb')
        ->width(100)
        ->height(100)
        ->sharpen(10);
    });


    }

    public function avatar(){
        return $this->hasOne(Media::class,'id','avatar_id');
    }

    public function getAvatarUrlAttribute(){
        return $this->avatar->getUrl('thumb');
    }

}
