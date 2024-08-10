<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'visitor_id',
        'title',
        'comment'
    ];
    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'visitor_id');
    }
}
