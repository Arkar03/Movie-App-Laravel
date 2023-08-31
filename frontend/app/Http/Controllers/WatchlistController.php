<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use App\Models\Watchlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class WatchlistController extends Controller
{
    public function addList($movieId)
    {


        $userId = Auth::id();
        Watchlist::create([
            'userId' => $userId,
            'movieId' => $movieId,
        ]);
        return redirect()->back();
    }
    public function remove($movieId)
    {
        $userId = Auth::id();
        Watchlist::where('movieId', $movieId)->delete($movieId);
        return redirect()->back();
    }
}
