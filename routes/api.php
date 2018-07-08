<?php
use Illuminate\Http\Request;


/*Route::get('/user', function (Request $request) {
    return response()->json([
        'error' => 'Resource not found.'
    ],500);
})->middleware('auth:api');*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('articles', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    echo "api-server";
});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Api\V1\Controllers'], function ($api) {
        $api->any('ArticleIndex', 'ArticleController@index');
        $api->any('ArticleShow', 'ArticleController@show');
    });
});

