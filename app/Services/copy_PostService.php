<?php
namespace App\Services;

use App\Models\Post;
use App\Models\PostLike;

class PostService
{
    /**
     * userのidとpostのidから、PostLikeモデルのインスタンスを取得する関数
     * （「ある特定のユーザーがある特定のpostにいいねした数」などの情報をもつインスタンスを取得する）
     * @param int $userId
     * @param int $postId
     * @return object|null PostLikeモデルのインスタンス|null
     */
    public function getPostLike($userId, $postId)
    {
        return PostLike::where(['user_id' => $userId, 'post_id' => $postId])->first();
    }

    /**
     * 対象postについているいいねの数を取得する関数
     * @param object $post Postモデルクラスのインスタンス
     * @return int $numOfLikes いいね数
     */
    // public function getNumOfLikes(Post $post): int
    // {
    //     $postLikes = $post->postLikes;
    //     $collection = $postLikes->map(function (PostLike $postLike){
    //         return $postLike->num_of_likes;
    //     });

    //     $numOfLikes = 0;
    //     foreach ($collection as $item){
    //         $numOfLikes + $item;
    //     }

    //     return $numOfLikes;
    // }

    /**
     * 対象postについているいいねの数を取得する関数
     * @param int $postId 
     * @return int $numOfLikes いいね数
     */
    public function getNumOfLikes($postId): int
    {
        $post = Post::where('id', $postId)->firstOrFail();
        $postLikes = $post->postLikes;    // ここがダメ。$post->postLikesがうまくいかない
        dd($postLikes);
        $collection = $postLikes->map(function (PostLike $postLike){
            return $postLike->num_of_likes;
        });

        $numOfLikes = 0;
        foreach ($collection as $item){
            $numOfLikes + $item;
        }

        return $numOfLikes;
    }
}