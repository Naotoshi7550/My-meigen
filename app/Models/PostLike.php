<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;


class PostLike extends Model
{
    use HasFactory;

    /**
     * 「いいね」がつけられた対象のユーザーを取得
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 「いいね」がつけられた対象のpostを取得
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
