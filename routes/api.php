<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Artist;
use App\Http\Resources\ArtistResource;
use App\Http\Resources\ArtistCollection;
use App\Models\Show;
use App\Http\Resources\ShowCollection;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/texte', function (Request $request) {
    $texte = 'Bonjour';

    return ['data'=>[
        'message'=>$texte
    ]];
});

Route::get('/response', function (Request $request) {
    $data = [
        'name'=>'Bob',
        'single'=> true,
    ];

    return response(json_encode($data))
        ->header('Content-Type', 'application/json');
});

Route::get('/json', function (Request $request) {
    $data = [
        'name'=>'Bob',
        'single'=> true,
    ];

    return response()->json($data);
});

Route::get('/artist', function (Request $request) {
    $artist = new Artist();

    $artist->firstname = 'Sull';
    $artist->lastname = 'Bob';

    return $artist;
})->middleware(['auth:sanctum']);

Route::get('/artist/{id}', function (Request $request, int $id) {
    $artist = Artist::findOrFail($id);

    return new ArtistResource($artist);
});

Route::get('/artists', function (Request $request) {
    $artists = Artist::all();

    return ArtistResource::collection($artists);
});

Route::get('/artists/collection', function (Request $request) {
    $artists = Artist::all();

    return new ArtistCollection($artists);
});

Route::get('/artists/paginate', function (Request $request) {
    $artists = Artist::paginate();

    return new ArtistCollection($artists);
});

Route::middleware('auth:sanctum')->get('/shows/paginate', function (Request $request) {
    $shows = Show::paginate();

    return new ShowCollection($shows);
});

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->token_name)->plainTextToken;
});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken('token-name');
 
    return ['token' => $token->plainTextToken];
});

