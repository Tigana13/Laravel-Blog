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
use App\User;

//Route::get('/post/{id}/{name}', 'PostsController@index');

//Route::resource('posts','PostsController');

Route::get('/contacts', 'PostsController@contact');

//Route::get('posts/{id}','PostsController@show_post');

Route::get('posts/{id}/{name}/{school}','PostsController@show_post');


Route::get('/', function () {
    return view('welcome');
});


Route::get('/insert', function (){
    DB::insert('insert into posts(title, body) VALUES (? , ?)', ['PHP with laravel','Laravel is the best thing that happened to PHP']);
});





/*
|--------------------------------------------------------------------------
|RETURNING A VIEW USING ROUTES
|--------------------------------------------------------------------------

*/
//Route::get('/about', function () {
//    return "About page is here";
//});
//
//Route::get('/contact', function () {
//    return "Contact page is here";
//});
//

/*
|--------------------------------------------------------------------------
|PASSING DATA TO A URL AND DISPLAYING IT
|--------------------------------------------------------------------------

*/
////Route::get('/post/{id}/{name}/{school}',function ($id, $name, $school){
////    return "This is post number ".$id." from ".$name." whose school is ". $school;
////});
//

/*
 *
|--------------------------------------------------------------------------
|NAMING ROUTES
|--------------------------------------------------------------------------

//*/
//Route::get('/post/{id}/{name}/{school}', array('as' => 'admin.home', function($id, $name, $school){
//
//    $url = route('admin.home');
//
////    return "this is url "." ".$url;
//    return "This is post number ".$id. " from ".$name." whose school is ".$school." FROM THIS URL ".$url;
//
//}));

//Route::get('/contact/example', array( 'as' => 'admin.home', function () {
//    $url = route('admin.home');
//
//    return "this is url".$url;
//}));
//


/*
|--------------------------------------------------------------------------
|RAW DATABASE SQL QUERIES: READ
|--------------------------------------------------------------------------

*/
//Route::get('/read', function () {
//
//
//    $results = DB::select('select * from posts where id = ? ', [2]);
//
//    return $results;
//
////    foreach ($results as $post){
////
////        return $post->title;
////
////    }
//
//
//
//});
/*
|--------------------------------------------------------------------------
|UPDATING DATA:RAW SQL
|--------------------------------------------------------------------------

*/

//Route::get('/update', function (){
//
//    $updated = DB::update('update posts set title = "updated title" where id = ?', [1]);
//
//    return $updated;
//
//});

/*
|--------------------------------------------------------------------------
|DELETING: RAW SQL
|--------------------------------------------------------------------------

*/
//Route::get('/delete', function (){
//
//    $deleted = DB::delete('delete from posts where id = ?', [2]);
//    return $deleted;
//});




/*
|--------------------------------------------------------------------------
                    ELOQUENT ORM
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/
// Route::get('/find', function (){
//
//    $posts = Post::all();
//
//    foreach ($posts as $post){
//
//        return $post->title;
//
//    }
//
//
//});

//Route::get('/find', function (){
//
//    $posts = Post::find(3);
//
//
//        return $posts->title;
//
//
//
//});

/*
|--------------------------------------------------------------------------
|INSERTING DATA TO DB USING ELOQUENT
|--------------------------------------------------------------------------

*/
//Finding data in DB by varying columns
//
//Route::get('/findwhere', function(){
//
//    $post = Post::where('id', 3 )->orderBy('id', 'desc')->take(1)->get();
//    return $post;
//
//});
//
//
//Route::get('/findmore', function(){
//
////    $post = Post::findOrFail(3);
////    return $post;
//
//    $post = Post::where('id','>', '1')->firstOrFail();
//    return $post;
//});


/*
|--------------------------------------------------------------------------
|INSERTING DATA TO DB USING ELOQUENT
|--------------------------------------------------------------------------

*/
//insertion of data
//
//Route::get('/eloquent_insert', function (){
//    $post = new Post;
//
//    $post->title = 'New ORM insert';
//    $post->body  = 'This insertion was made using the eloquent ORM';
//    $post->created_at = time()+(7*24*60*60);
//
//    $post->save();
//});


/*
|--------------------------------------------------------------------------
|To update an already inserted record in the DB using the save() method
|--------------------------------------------------------------------------

*/
//

//Route::get('/eloquent_update', function (){
//    $post = Post::find(4);
//
//    $post->title = 'New ORM update to id 4';
//    $post->body  = 'This update was made using the eloquent ORM';
//    $post->created_at = time()+(7*24*60*60);
//
//    $post->save();
//});


/*
|--------------------------------------------------------------------------
|Creating Data using eloquent ORM
|--------------------------------------------------------------------------

*/
//

//Route::get('/create', function (){
//
//    Post::create(['title'=>'The create method', 'body'=>'WOW I\'m learning a lot with Edwin Diaz']);
//    Post::create(['title'=>'yet another record', 'body'=>'WOW! Multiple row insertion using laravel create method in eloquent']);
//});

/*
|--------------------------------------------------------------------------
|Updating Data using ELOQUENT ORM
|--------------------------------------------------------------------------

*/

//
//
//Route::get('/update', function (){
//
//    Post::where('id', 4)->update(['title'=>'NEW UPDATED TITLE', 'body'=>'I love my instructor']);
//
//});

/*
|--------------------------------------------------------------------------
|DELETING DATA FROM DB USING ELOQUENT
|--------------------------------------------------------------------------

*/

//Route::get('/delete', function (){
//    $post = Post::find(4);
//    $post->delete();
//});


//another method of DELETION using the destroy() function
//Route::get('/deletemethod3', function(){
//   Post::destroy([1,5,6]);
//});

//

/*
|--------------------------------------------------------------------------
|SOFT DELETES
|--------------------------------------------------------------------------

*/

//import the soft deletes class into the Model Class
//this way:
// use Illuminate\Database\Eloquent\SoftDeletes

Route::get('/softdelete', function(){

    Post::find(2)->delete();

});

Route::get('/findall', function (){
    $post = Post::find(4);

    return $post;

//    foreach ($post as $post_item) {
//        return $post_item->id;
//    }


});
/*
|--------------------------------------------------------------------------
| READING SOFT DELETES
|--------------------------------------------------------------------------

*/
//Route::get('/readsoftdelete', function (){
//
////     $post = Post::find(1);
//
//    //return only the trashed records
//     $post = Post::onlyTrashed()->where('id', 2)->get();
//
//     //return all including the trashed records
//    $post = Post::withTrashed()->get();
//    return $post;
//
//});

/*
|--------------------------------------------------------------------------
| RESTORING SOFT DELETES
|--------------------------------------------------------------------------

*/

//Route::get('/restore', function (){
//
//    Post::withTrashed()->where('id', 1)->restore();
//
//});

/*
|--------------------------------------------------------------------------
| DELETING PERMANENTLY SOFT DELETES
|--------------------------------------------------------------------------

*/

Route::get('/forcedelete', function (){

    Post::onlyTrashed()->forceDelete();

});

/*
|--------------------------------------------------------------------------
| ELOQUENT RELATIONSHIPS
|--------------------------------------------------------------------------

*/
Route::get('/user/{id}/post', function($id){

        return User::find($id);

});