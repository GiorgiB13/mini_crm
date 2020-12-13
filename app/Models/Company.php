<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Company extends Model implements HasMedia
{
    use HasFactory, HasMediaTrait;

    protected $fillable = [
        'name',
        'email',
        'image'
    ];

    public function deleteLogo()
    {
        File::delete(public_path() . '/images/company_logos/' . $this->logo);
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('logo')
            ->acceptsFile(function (File $file){
                return $file->mimeType === 'image/jpeg';
            })
            ->registerMediaConversions( function (Media $media){
                $this->addMediaConversion('thumbnail')
                    ->width('100')
                    ->height('100');
            });
    }

    public function getLogo(){
        if ($this->hasMedia('logo')) {
            return $this->getMedia('logo')
                ->first()
                ->getUrl();
        }
        else{
            return false;
        }
    }

    public function getLogoThumbnail(){
        if ($this->hasMedia('logo')){
            return $this->getMedia('logo')
                ->first()
                ->getUrl('thumbnail');
        }
        else{
            return false;
        }
    }

}
