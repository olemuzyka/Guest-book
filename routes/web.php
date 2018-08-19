<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Post;
use Illuminate\Http\Request;

Route::get('/', function () {
    $posts = Post::orderBy('created_at', 'asc')->paginate(2);
    return view('posts', [
        'posts' => $posts
    ]);
});


Route::post('/post', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'email' => 'required',
        'post' => 'required'
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $post = new Post();
    $post->name = $request->name;
    $post->email = $request->email;
    $post->post = $request->post;

    $post->save();

    return redirect('/');

});

Route::delete('/post/{post}', function (Post $post) {
    $post->delete();
    return redirect('/');
});


Route::post('/edit/{post}', function (Post $post) {
    $posts = Post::find($post);
    return view('edit', [
        'posts' => $posts
    ]);
});
