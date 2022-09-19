<?php

namespace App\Services;

use App\Repositories\PostRepository;
use Exception;
use Facade\FlareClient\Http\Exceptions\InvalidData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    public function getAll()
    {
        return $this->postRepository->getAllPost();
    }
    public function getById($id)
    {
        return $this->postRepository->getById($id);
    }
    public function savePostData($data)
    {

        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->postRepository->save($data);

        return $result;
    }

    // func update post data
    public function UpdatePost($data, $id)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }
        DB::beginTransaction();
        try {
            $result = $this->postRepository->updatedata($data, $id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('abccc');
        }
        DB::commit();
        return $result;
    }

    public function DeletePost($id)
    {
        DB::beginTransaction();
        try {
            $post = $this->postRepository->DeletePost($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("aaaaa");
        }
        DB::commit();
        return $post;
    }
}
