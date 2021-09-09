<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task\Interfaces\UserInterface;

class User extends Model implements UserInterface
{
    //

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birthday'
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

    public function posts()
    {
        return $this->hasMany(Post::class);
        // note: we can also include comment model like: 'App\Models\Comment'
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
        // note: we can also include comment model like: 'App\Models\Comment'
    }
}
