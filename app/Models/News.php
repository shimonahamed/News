<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable=[
      'category_id',
      'title',
      'img',
      'details'
    ];
    public function cat(){
        return $this->belongsTo(categoryModel::class, 'category_id','id');
    }
    public function author(){
        return $this->belongsTo(User::class,'create_by','id');
    }
}
