<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'parent_id', 'body', 'tracker_id'];

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function tracker()
    {
        return $this->belongsTo(Tracker::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachment()
    {
        return $this->hasOne(Attachment::class, 'table_id')->where('table_name', 'comments');
    }
}
