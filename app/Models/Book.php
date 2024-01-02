<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Book extends Model
{
    use HasFactory;
    // protected $guarded = [
    //     'id',
    //     'user_id',
    //     'category_id'
    // ];

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'quantity',
        'description',
        'file',
        'cover'
    ];

    protected $with = 'category';

    public function scopeFilter($query, $filters){

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%' );
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }
}
