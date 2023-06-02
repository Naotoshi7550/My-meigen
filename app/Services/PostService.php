<?php
namespace App\Services;

use App\Models\Post;
use App\Models\PostLike;

class PostService
{

    /**
     * postIdをもとに、あるpostにいいねを押したユーザーの人数を算出する関数
     * @param int $postId
     * @return int そのpostにいいねを押したユーザーの人数
     */
    public function getNumOfLikedUsers(int $postId)
    {
        $postLikes = PostLike::where('post_id', $postId)->get();
        $likedUsers = $postLikes->map(function (PostLike $postLike){
            return $postLike->user_id;
        });
        return count($likedUsers);
    }

/**
     * postIdとuserIdをもとに、PostLikeモデルのインスタンスを取得する関数
     * （「あるユーザーがあるpostにいいねした数」などの情報をもつインスタンスを取得する）
     * @param int $userId
     * @param int $postId
     * @return object|null PostLikeモデルのインスタンス|null
     */
    public function getNumOfLikesByUser(int $postId, int $userId)
    {
        return PostLike::where(['post_id' => $postId, 'user_id' => $userId])->first();
    }


    /**
     * ある投稿が、そのユーザーの投稿したものであるかをチェックするメソッド
     * @param int $postId
     * @param int $userId
     * @return bool
     */
    public function checkOwnPost(int $postId, int $userId)
    {
        $post = Post::where('id', $postId)->first();
        if ($post === null){
            return false;
        }

        return $post->user_id === $userId;
    }


    /**
     * postIdをもとに、そのpostに押されたいいねの数を算出する関数
     * @param int $postId 
     * @return int $numOfLikes いいね数
     */
    // public function getNumOfLikes($postId): int
    // {
    //     $numOfLikes = 0;
        
    //     $postLikes = PostLike::where('post_id', $postId)->get();
    //     if ($postLikes === null){
    //         return $numOfLikes;
    //     }
        
    //     $collection = $postLikes->map(function (PostLike $postLike){
    //         return $postLike->num_of_likes;
    //     });
    //     foreach ($collection as $item){
    //         $numOfLikes += $item;
    //     }
        
    //     return $numOfLikes;
    // }
}