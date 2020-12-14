<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Employee extends Model implements HasMedia
{
    use HasFactory, HasMediaTrait;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company_id',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
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

    public function getCompanyLogoThumbnail(){
        if ($this->hasMedia('logo')) {
            return $this->company->getMedia('logo')
                ->first()
                ->getUrl('thumbnail');
        }
        else{
            return false;
        }
    }

    public function path(){
        return url("admin/employees/{$this->id}-".Str::slug($this->first_name));
    }
}
