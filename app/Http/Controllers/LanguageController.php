<?php


namespace App\Http\Controllers;


use App\Models\Artist;
use App\Models\ArtistLanguage;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function artist_language($id)
    {
        App::setLocale('fr');
        $artist_langauages=ArtistLanguage::query()->where(['language_id'=>$id,'level'=>"Courant"])->paginate(5);

        return view('artist.language',[
            'artist_languages' => $artist_langauages,
            'resource' => 'artistes',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        App::setLocale('fr');
        $languages = DB::table('languages')->paginate(5);

        return view('admin.language.index',[
            'languages' => $languages,
            'resource' => 'languages',
        ]);
    }
    public function artists($id)
    {
        App::setLocale('fr');
     //   $languages = DB::table('artist_languages')->where(['language_id'=>$id])->paginate(5);
        $languages = ArtistLanguage::query()->where(['language_id'=>$id])->paginate(5);
        return view('admin.language.artists',[
            'languages' => $languages,
            'resource' => 'List artist',
        ]);
    }
    public function create()
    {

        return view('admin.language.create');
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
            'language' => 'required|max:60',
        ]);

        //Le formulaire a été validé, nous créons un nouvel artiste à insérer
        $language = new Language();

        //Assignation des données et sauvegarde dans la base de données
        $language->language = $validated['language'];

        $language->save();

        return redirect()->route('admin.language.index');
    }

}
