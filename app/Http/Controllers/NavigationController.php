<?php

namespace App\Http\Controllers;

use App\Camping;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavigationController extends Controller
{
    /**
     * Affichage d'index de navigation
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewIndex()
    {
        return view('navigation.index');
    }

    /**
     * Retour des campings en pagination 6 par page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCampings()
    {
        return Camping::with('photos')->paginate(6);
    }

    /**
     * Ajouter un camping aux favoris
     * @param Request $request
     */
    public function likeCamping(Request $request)
    {
        $user_id = Auth::user()->id;
        $camping_id = $request->get('camping_id');
        $like = Like::where([
            ['user_id', $user_id],
            ['camping_id', $camping_id]
        ])->first();

        if (!$like) {
            $like = new Like();
            $like->user_id = $user_id;
            $like->camping_id = $camping_id;
            $like->save();
        }
    }

    /**
     * Supprimer un camping des favoris
     * @param Request $request
     */
    public function hateCamping(Request $request)
    {
        $user_id = Auth::user()->id;
        $camping_id = $request->get('camping_id');
        $like = Like::where([
            ['user_id', $user_id],
            ['camping_id', $camping_id]
        ])->first();

        if ($like) {
            $like->delete();
        }
    }

    /**
     * Retours des ids des campings favoris
     * @return mixed
     */
    public function getLikesCampingIds()
    {
        return Like::where('user_id', Auth::user()->id)->pluck('camping_id')->toArray();
    }

    /**
     * Affichage des favoris
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewFavoris()
    {
        return view('navigation.favoris');
    }

    /**
     * Retour des campings favoris en pagination 6 par page
     * @return array
     */
    public function getCampingsFavoris()
    {
        $campings = array();
        $like_ids = Like::where('user_id', Auth::user()->id)->pluck('camping_id')->toArray();
        foreach ($like_ids as $id) {
            $camping = Camping::where('id', $id)->with('photos')->first();
            array_push($campings, $camping);
        }
        return $campings;
    }

    /**
     * Retour d'un seul camping par cle public
     * @param $public_key
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewSingleCamping($public_key)
    {
        $camping = Camping::where('public_key', $public_key)->first();
        if($camping){
            return view('navigation.single', compact('camping'));
        }else{
            return abort(404);
        }
    }
}
