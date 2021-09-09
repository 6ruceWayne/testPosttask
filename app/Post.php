<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task\Interfaces\MediaPostInterface;

class Post extends Model implements MediaPostInterface
{
    protected $fillable = [
        'text',
        'views',
        'image'
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

    public function comments()
    {
        return $this->morphMany(Comment::class, 'parent');
        // note: we can also include comment model like: 'App\Models\Comment'
    }

    public function getComments(): array
    {
        return array();
    }
}
