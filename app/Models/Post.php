<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['user'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($date) : string
    {
        return Carbon::parse($date)->diffForHumans();
    }

    public function getPosterAttribute($poster): string
    {
        return $poster ?? 'storage/408CFF55-9FC5-4103-A982-16879A2834C9_1_105_c.jpeg';
    }

    public function getMovieAttribute($video): string
    {
        return $video ?? 'storage/IMG_1663.mp4';
    }
}
