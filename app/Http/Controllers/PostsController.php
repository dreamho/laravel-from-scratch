<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class PostsController
 * @package App\Http\Controllers
 */
class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        $posts = Post::latest();
//        if ($month = request('month')) {
//            $posts->whereMonth('created_at', Carbon::parse($month)->month);
//        }
//        if ($year = request('year')) {
//            $posts->whereYear('created_at', $year);
//        }
//        $posts = $posts->get();
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
//        $post = Post::find($id);

        return view('posts.show', ['post' => $post]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//        $post = new Post();
//        $post->title = request('title');
//        $post->body = request('body');
//        $post->save();

        $this->validate($request, [
            'title' => 'required',
            'body'  => 'required',
            'tags' => 'required',
        ]);
//dd(request(['tags']));die;
        auth()->user()->publish(new Post(request(['title', 'body'])), request('tags'));
//        Post::create(request(['title', 'body']));
        session()->flash('message', 'You are successfully published the post!');

        return redirect('/');
    }

}
