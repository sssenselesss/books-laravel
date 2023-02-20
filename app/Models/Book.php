<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected  $fillable  = [
        'title',
        'content',
        'image',
        'author',
        'category_id',
    ];


    public function getImageUrlAttribute()
    {
        return asset(Storage::url($this->image));
    }
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id')->first();
    }
}
