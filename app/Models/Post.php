<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];
    
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tag(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_many_tag','post_id', 'tag_id');
    }
    
}
