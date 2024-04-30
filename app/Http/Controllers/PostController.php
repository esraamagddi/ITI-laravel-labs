<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts= [
        ['id'=>1 ,'title'=>'title1' , 'body'=> 'body1', 'image'=>'img1.jpeg'],
        ['id'=>2 ,'title'=>'title2' , 'body'=> 'body2', 'image'=>'img2.jpeg'],
        ['id'=>3 ,'title'=>'title3' , 'body'=> 'body3', 'image'=>'img3.jpeg'],
        ['id'=>4 ,'title'=>'title4' , 'body'=> 'body4', 'image'=>'img4.jpeg']
    ];

    public function index()
    {
        return view("index", ["posts" => $this->posts]);
    }

    public function show($id)
    {
        $post = $this->getPostById($id);
        if ($post) {
            return view('show', ["post" => $post]);
        }
        return abort(404);
    }

    public function create()
    {
        return view("create");
    }

    public function edit($id)
    {
        $post = $this->getPostById($id);
        if ($post) {
            return view('edit', ["post" => $post]);
        }
        return abort(404);
    }

    public function destroy($id)
    {
        $post = $this->getPostById($id);
        if ($post) {
            return view('destroy', ["post" => $post]);
        }
        return abort(404);
    }

    private function getPostById($id)
    {
        if ($id >= 1 && $id <= count($this->posts)) {
            return $this->posts[$id - 1];
        }
        return null;
    }
}
