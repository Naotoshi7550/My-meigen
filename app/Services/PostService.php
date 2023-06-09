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
     * あるユーザーが、任意のpostにいいねしているかどうかを調べる関数
     * @param int $userId
     * @param int $postId
     * @return bool $result  いいねしていたらtrue、していなかったらfalseを返す
     */
    public function hasLikedByUser(int $postId, int $userId)
    {
        $result = false;

        $postLike = PostLike::where(['post_id' => $postId, 'user_id' => $userId])->first();
        if ($postLike !== null){
            $result = true;
        }

        return $result;
    }


    /**
     * あるユーザーが、任意のpostにいくついいねをしているかを調べる関数
     * @param int $userId
     * @param int $postId
     * @return int  いいねをした数
     */
    public function getNumOfLikesByOneUser(int $postId, int $userId)
    {
        if ($this->hasLikedByUser($postId, $userId) === false){
            return 0;
        } else {
            return PostLike::where(['post_id' => $postId, 'user_id' => $userId])->first()->num_of_likes;
        }
    }



    /**
     * postIdとuserIdをもとに、PostLikeモデルのインスタンスを取得する関数
     * （「あるユーザーがあるpostにいいねした数」などの情報をもつインスタンスを取得する）
     * @param int $userId
     * @param int $postId
     * @return object|null PostLikeモデルのインスタンス|null
     */
    public function getPostLike(int $postId, int $userId)
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
     * ユーザーがこれまでに獲得したいいねの個数を取得する関数
     * @param int $userId
     * @return int $allLikes 　ユーザーがこれまでに獲得したいいねの個数
     */
    public function getAllLikes($userId)
    {
        $allLikes = 0;

        $posts = Post::where('user_id', $userId)->get();
        if ($posts === null){
            return $allLikes;
        }
        
        foreach ($posts as $post){
            $allLikes += $post->num_of_likes;
        }

        return $allLikes;
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