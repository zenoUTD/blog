<?php

Route::get('/', function () {
    //return view('welcome');

    return redirect()->route('blog-posts.index');
});

# Blog Posts Routes
Route::group(['middleware' => ['auth']], function () {
//
});

Route::resource('blog-posts','BlogPostController');

Route::get('authors','AuthorController@viewAll')->name('authors');
Route::get('authors/delete/{id}','AuthorController@delete')->name('author-delete');

Route::post('post-comment','BlogPostController@comment')->name('post-comment');

Route::resource('subscribers','SubscriberController')->only(['store']);

Route::get('mail-confirmation','SubscriberController@mail_confirmation');

Route::post('mail-confirmation','SubscriberController@confirmation')->name('mail.confirmation');

Auth::routes();

Route::get('/home', 'BlogPostController@index')->name('home');



// Route::get('ajax',function() {
//    return view('message');
// });
// Route::post('/getmsg','AjaxController@index');
