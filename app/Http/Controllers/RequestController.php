<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function index() {
        return view('request.index');
    }

    public function resolver(int $id) {
        $shows = [];
        $uniqueResult = null;

        switch($id) {
            case 1:
                $shows = DB::table('shows')->get();

                break;
            default:
        }

        return view('request.index', [
            'shows' => $shows,
            'uniqueResult' => $uniqueResult,
        ]);
    }
}
