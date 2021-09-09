<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task\Interfaces\CommentInterface;

class Comment extends Model implements CommentInterface
{
    //
    protected $fillable = [
        'text'
    ];

    public function generate(int $number): void
    {
        /*for ($i=0;$i<$number;$i++) {
            $this->create();
        }*/
    }

    public function toJSON($options = 0): string
    {
        return json_encode($this->jsonSerialize(), JSON_PRETTY_PRINT);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
