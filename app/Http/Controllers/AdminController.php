<?php

namespace App\Http\Controllers;

use App\Camping;
use App\Like;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Array_;

class AdminController extends Controller
{
    /**
     * Affichage d'administration
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewIndex()
    {
        $nbrCamping = Camping::all()->count();
        $nbrLikes = Like::all()->count();
        $nbrUsers = User::where('admin', 0)->count();
        $date = date("Y/m/d");
        return view('admin.index', compact('nbrCamping', 'nbrLikes', 'nbrUsers', 'date'));
    }

    /**
     * Affichage Ajout
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewAjout()
    {
        return view('admin.campings.ajout');
    }

    /**
     * Get data from Json file
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadFile(Request $request)
    {
        if ($request->hasFile('file')) {
            $json = json_decode(file_get_contents($request->file('file')), true);
            $count = 0;
            foreach ($json as $obj) {
                $checkCmaping = Camping::where('adresse', $obj['fields']['adresse'])
                    ->where('nom', $obj['fields']['nom_commercial'])
                    ->where('phone', $obj['fields']['telephone'])
                    ->first();
                if (!$checkCmaping) {
                    $camping = new Camping();
                    $camping->public_key = str_random(40);
                    $camping->adresse = $obj['fields']['adresse'];
                    $camping->nom = $obj['fields']['nom_commercial'];
                    $camping->commune = $obj['fields']['commune'];
                    $camping->categorie = $obj['fields']['categorie'];
                    $camping->email = $obj['fields']['courriel'];
                    $camping->site = $obj['fields']['site_internet'];
                    $camping->phone = $obj['fields']['telephone'];
                    $camping->lat = $obj['fields']['lat'];
                    $camping->lng = $obj['fields']['lng'];
                    $classement = preg_replace("/[^0-9]/", '', $obj['fields']['classement']);
                    $camping->classement = $classement;
                    $camping->code_postal = $obj['fields']['code_postal'];
                    $camping->nbr = $obj['fields']['nombre_d_emplacements'];
                    $camping->save();
                    $count++;
                }
            }
            return response()->json([
                'done' => true,
                'count' => $count
            ]);
        } else {
            return response()->json(['uploaded' => false]);
        }
    }

    /**
     * Ajouter un Camping
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajoutCamping(Request $request)
    {

        $this->validate($request, [
            'adresse' => 'required',
            'nom' => 'required',
            'commune' => 'required',
            'categorie' => 'required',
            'email' => 'required|email',
            'site' => 'required',
            'phone' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'classement' => 'required|integer',
            'code_postal' => 'required',
            'nbr' => 'required|integer',
        ]);
        $camping = new Camping();
        $camping->adresse = $request->get('adresse');
        $camping->public_key = str_random(40);
        $camping->nom = $request->get('nom');
        $camping->commune = $request->get('commune');
        $camping->categorie = $request->get('categorie');
        $camping->email = $request->get('email');
        $camping->site = $request->get('site');
        $camping->phone = $request->get('phone');
        $camping->lat = $request->get('lat');
        $camping->lng = $request->get('lng');
        $camping->classement = $request->get('classement');
        $camping->code_postal = $request->get('code_postal');
        $camping->nbr = $request->get('nbr');
        $camping->save();
        $files = $request->file('files');
        foreach ($files as $file) {
            $file->move('uploads', $file->getClientOriginalName());
            $photo = new Photo();
            $photo->url = 'uploads/' . $file->getClientOriginalName();
            $camping->photos()->save($photo);
        }

        return response()->json([
            'done' => true,
            'public_key' => $camping->public_key
        ]);

    }

    /**
     * Affichage consultation
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewConsultation()
    {
        return view('admin.campings.consultation');
    }

    /**
     * Retour des campings en pagination 24 par page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getCampings()
    {
        return Camping::with('photos')->paginate(24);
    }

    /**
     * Affichage de modification
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewModification()
    {
        return view('admin.campings.modification');
    }

    /**
     * Retour de tous les campings
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllCampings()
    {
        return Camping::with('photos')->get();
    }

    /**
     * Retour de camping par cle public
     * @param $public_key
     * @return mixed
     */
    public function getCampingByKey($public_key)
    {
        return Camping::with('photos')->where('public_key', $public_key)->first();
    }

    /**
     * Modification d'un camping
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editCamping(Request $request)
    {
        $this->validate($request, [
            'adresse' => 'required',
            'nom' => 'required',
            'commune' => 'required',
            'categorie' => 'required',
            'email' => 'required|email',
            'site' => 'required',
            'phone' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'classement' => 'required|integer',
            'code_postal' => 'required',
            'nbr' => 'required|integer',
        ]);

        $camping = Camping::where('public_key', $request->get('public_key'))->first();
        if ($camping) {
            $camping->adresse = $request->get('adresse');
            $camping->nom = $request->get('nom');
            $camping->commune = $request->get('commune');
            $camping->categorie = $request->get('categorie');
            $camping->email = $request->get('email');
            $camping->site = $request->get('site');
            $camping->phone = $request->get('phone');
            $camping->lat = $request->get('lat');
            $camping->lng = $request->get('lng');
            $camping->classement = $request->get('classement');
            $camping->code_postal = $request->get('code_postal');
            $camping->nbr = $request->get('nbr');
            $files = $request->file('files');
            if ($files) {
                foreach ($files as $file) {
                    $file->move('uploads', $file->getClientOriginalName());
                    $photo = new Photo();
                    $photo->url = 'uploads/' . $file->getClientOriginalName();
                    $camping->photos()->save($photo);
                }
            }
            $camping->save();

            return response()->json([
                'updated' => true,
                'camping' => $camping
            ]);
        } else {
            return response()->json([
                'found' => false
            ]);
        }
    }

    /**
     * Suppression d'un camping
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCamping(Request $request)
    {
        $camping = Camping::where('public_key', $request->get('public_key'))->first();
        if ($camping) {
            $likes = Like::where('camping_id', $camping->id);
            if ($likes) $likes->delete();
            $camping->delete();
            return response()->json([
                'deleted' => true
            ]);
        } else {
            return response()->json([
                'deleted' => false
            ]);
        }
    }

    /**
     * Affichage des clients
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewClients()
    {
        return view('admin.users.clients');
    }

    /**
     * Retour de tous les utilisateurs
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getUsers()
    {
        return User::where('admin', 0)->get();
    }

    /**
     * Suppression d'un utilisateur
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteUser(Request $request)
    {
        $user = User::where('public_key', $request->get('public_key'));
        if ($user) {
            $user->delete();
            return response()->json([
                'deleted' => true
            ]);
        } else {
            return response()->json([
                'deleted' => false
            ]);
        }
    }

    /**
     * Affichage des statistiques classement
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewClassement()
    {
        return view('admin.statistiques.classement');
    }

    /**
     * Retour de classement des campings
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getClassement()
    {
        return Camping::all()->pluck('classement')->toArray();
    }

    /**
     * Affichage des statistiques catégories
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewCategories()
    {
        return view('admin.statistiques.categorie');
    }

    /**
     * Retour des categories des campings
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCategories()
    {
        return Camping::all()->pluck('categorie')->toArray();
    }

    /**
     * Affichage des statistiques inscription
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewInscriptions()
    {
        return view('admin.statistiques.inscriptions');
    }

    /**
     * Retour des mois d'inscriptions
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getInscriptions()
    {
        return User::orderBy('created_at', 'asc')->pluck('created_at')->toArray();
    }

    /**
     * Affichage des statistiques inscription
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewCarte()
    {
        return view('admin.map.carte');
    }

    /**
     * Retour des campings favoris en pagination 6 par page
     * @return array
     */
    public function getCampingsFavoris()
    {
        return Camping::select(DB::raw('campings.*, count(*) as `aggregate`'))
            ->join('likes', 'campings.id', '=', 'likes.camping_id')
            ->groupBy('camping_id')
            ->orderBy('aggregate', 'desc')
            ->get();


    }

    /**
     * Affichage des statistiques favoris
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewFavoris()
    {
        return view('admin.statistiques.favoris');
    }

    /**
     * Delete photo admin
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Http\JsonResponse|static[]
     */
    public function deletePhoto(Request $request)
    {
        $photo = Photo::find($request->get('id'));
        if ($photo) {
            $photo->delete();
            $photos = Photo::all();
            return $photos;
        } else {
            return response()->json([
                'deleted' => false
            ]);
        }
    }

    /**
     * Retour d'un seul camping par cle public
     * @param $public_key
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewSingleCamping($public_key)
    {
        $camping = Camping::where('public_key', $public_key)->first();
        if ($camping) {
            return view('admin.single', compact('camping'));
        } else {
            return abort(404);
        }
    }

    /**
     * Edition du mot de passe admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editProfile()
    {
        return view('admin.profile');
    }

    /**
     * Modification du mot de passe
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editPassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|same:password'
        ]);

        if (Hash::check($request->get('old_password'), Auth::user()->password)) {
            $user = Auth::user();
            $newPassword = Hash::make($request->get('password'));
            $user->password = $newPassword;
            $user->save();
            return response()->json(['changed' => true]);
        } else {
            return response()->json([
                'old_password' => ['Mot de passe incorecte']
            ], 422);
        }
    }


}
