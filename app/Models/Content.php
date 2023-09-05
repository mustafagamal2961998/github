<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'category_id',
        'title',
        'slug',
        'content',
        'views'
    ];
    //start relationships
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    //end relationships
    
    
    // start local scope
    public function scopeActive(Builder $builder){
        $builder->whereStatus('active');
    }
    //end local scope

    protected $casts = [
        'title'=>'array',
        'content'=>'array',
    ];

}
