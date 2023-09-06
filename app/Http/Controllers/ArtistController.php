<?php

namespace App\Http\Controllers;

use App\Models\ArtistLanguage;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\Artist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\App;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        App::setLocale('fr');

        $artists = DB::table('artists')->paginate(5);

        return view('admin.artist.index',[
            'artists' => $artists,
            'resource' => 'artistes',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    /*    if(Auth::user()==null || Auth::user()->role!='admin') {
            return redirect()->route('login');
        }
    */
        if (! Gate::allows('create-artist')) {
            abort(403);
        }

        return view('artist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation des données du formulaire
        $validated = $request->validate([
            'firstname' => 'required|max:60',
            'lastname' => 'required|max:60',
        ]);

	   //Le formulaire a été validé, nous créons un nouvel artiste à insérer
        $artist = new Artist();

        //Assignation des données et sauvegarde dans la base de données
        $artist->firstname = $validated['firstname'];
        $artist->lastname = $validated['lastname'];

        $artist->save();

        return redirect()->route('artist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Artist::find($id);
        $artist_langauages=ArtistLanguage::query()->where(['artist_id'=>$id])->paginate(5);
        return view('artist.show',[
            'artist' => $artist,
            'artist_languages' => $artist_langauages,
        ]);
    }
    public function addlanguage($id,Request $request)
    {
        $artist = Artist::find($id);
        if ($request->method()== "POST"){
            $la=new ArtistLanguage();
            $la->artist_id=$id;
            $la->language_id=$request->language_id;
            $la->level=$request->level;
            $la->save();
        }
        $languge_artists=ArtistLanguage::query()->where(['artist_id'=>$id])->get();
        $languges=Language::all();

        return view('admin.artist.addlanguage',[
            'artist' => $artist,
            'languages'=>$languges,
            'lanugauge_artist'=>$languge_artists
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('create-artist')) {
            abort(403);
        }

        $artist = Artist::find($id);

        return view('artist.edit',[
            'artist' => $artist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validation des données du formulaire
        $validated = $request->validate([
            'firstname' => 'required|max:60',
            'lastname' => 'required|max:60',
        ]);

	   //Le formulaire a été validé, nous récupérons l’artiste à modifier
        $artist = Artist::find($id);

	   //Mise à jour des données modifiées et sauvegarde dans la base de données
        $artist->update($validated);

        return view('artist.show',[
            'artist' => $artist,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('create-artist')) {
            abort(403);
        }

        $artist = Artist::find($id);

        if($artist) {
            $artist->delete();
        }

	   return redirect()->route('artist.index');
    }
}
