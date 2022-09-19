<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    public function getAllPost()
    {
        return $this->post->get();
    }
    public function getById($id)
    {
        // die("aaa");
        return $this->post->where('id', $id)->get();
    }
    public function save($data)
    {
        $postc = new $this->post;
        $postc->title = $data['title'];
        $postc->description = $data['description'];
        // $postc::create($data);
        $postc->save();
        return $postc->fresh();
    }

    public function updatedata($data, $id)
    {
        $postData = $this->post->find($id);
        // print($postData);
        $postData->title = $data['title'];
        $postData->description = $data['description'];
        $postData->update();
        return $postData;
    }

    public function DeletePost($id)
    {
        $postDelete = $this->post->find($id);
        if ($postDelete->where('id', $id)->delete())
            return 'Delete Successfully';
        else return 'Delete Faild!';
    }
}
