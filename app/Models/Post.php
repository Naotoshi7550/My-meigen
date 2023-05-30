<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    /**
     * このpostを投稿したuserを取得
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

