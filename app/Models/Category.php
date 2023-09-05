<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
class Category extends Model implements HasMedia
{
    use HasFactory,SoftDeletes,InteractsWithMedia;
    protected $fillable =[
        'name',
        'slug',
        'description',
        'status'
    ];

    
    //start relationships
    public function contents(){
        return $this->hasMany(Content::class,'category_id','id');
    }
    //end relationships



    // start local scope
    public function scopeActive(Builder $builder){
        $builder->whereStatus('active');
    }
    //end local scope






    protected $casts=[
        'name'=>'array',
        'description'=>'array',
    ];


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('category')
             ->useFallbackUrl('https://www.hobodataloggers.com.au/images/default-image.png')
             ->singleFile()
             ->useDisk('category');
    }

    
}
