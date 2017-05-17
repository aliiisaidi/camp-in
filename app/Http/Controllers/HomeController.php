<?php

namespace App\Http\Controllers;

use App\Camping;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Affichage d'accueil
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewHome()
    {
        $campings =  Camping::select(DB::raw('campings.*, count(*) as `aggregate`'))
            ->join('likes', 'campings.id', '=', 'likes.camping_id')
            ->groupBy('camping_id')
            ->orderBy('aggregate', 'desc')
            ->limit(4)
            ->get();
        if(count($campings) < 4){
            $campings = Camping::limit(4)->get();
        }
        return view('welcome', compact('campings'));
    }
    public function notFound()
    {
        return view('errors.404');
    }
    /**
     * Inscription
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function inscription(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);


        $user = new User();
        $user->first_name = title_case($request->get('first_name'));
        $user->last_name = title_case($request->get('last_name'));
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->admin = false;
        $user->confirmed = false;
        $user->public_key = str_random(40);

        if ($user->save()) {
            Mail::send('emails.inscription', ['user' => $user], function ($message) use ($user) {
                $message->from('support@campin.fr', 'Support Campin');
                $message->to($user->email);
            });
            return response()->json(['saved' => true]);
        } else {
            return response()->json(['saved' => false]);
        }

    }

    /**
     * Confirmation d'émail
     * @param $key
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function emailConfirmation($key)
    {

        if ($user = User::where('public_key', $key)->first()) {
            if (!$user->confirmed) {
                $user->confirmed = true;
                $user->save();
                Session::flash('title', 'Félicitation');
                Session::flash('message', 'Vous avez bien validé votre email , connectez vous pour accéder à votre espace.');
                return redirect('/#login');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    /**
     * Connexion
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function connexion(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $remember = true;
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'confirmed' => 1], $remember)) {
            return response()->json(['connected' => true]);
        } else {
            return response()->json([
                'password' => ['E-mail ou mot de passe invalide']
            ],422);
        }
    }

    /**
     * Déconnexion
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
