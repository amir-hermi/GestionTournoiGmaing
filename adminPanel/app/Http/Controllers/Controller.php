<?php

namespace App\Http\Controllers;

use App\Models\participation;
use http\Env\Request;
use http\Env\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function SelectAllTournaments($id)
    {
        $tournoi = DB::table('tournois')
            ->join('games', 'tournois.id_game', '=', 'games.id')
            ->select('tournois.id', 'tournois.nom', 'tournois.type', 'tournois.image', 'tournois.description', 'tournois.recompense', 'tournois.date_debut', 'tournois.date_fin', 'tournois.id_game', 'games.nom', 'games.platforme_id')
            ->where('games.platforme_id', '=', $id)
            ->get();
        return json_encode($tournoi);
    }




    public function usersLogin($email, $password)
    {
        $user = DB::table('utilisateurs')
            ->select('id', 'email', 'nom', 'prenom', 'mot_de_passe')
            ->where('email', '=', $email)
            ->get();
        if ($user->isEmpty()) {
            return response()->json(
                [[
                    'status' => 'fail',
                    'email' => 'aa@aa.com',
                    'password' => ''
                ]
                ]
            );
        }
        else {
            foreach ($user as $users) {
                if (Hash::check($password, $users->mot_de_passe)) {
                    return $user;
                } else {
                    return response()->json(
                        [[
                            'status' => 'fail',
                            'email' => 'aa@aa.com',
                            'password' => 'error'
                        ]
                        ]
                    );
                }
            }
        }
    }
    public function updateprofile($id, $nom, $prenom, $newpassword, $oldpassword)
    {
        $check = DB::table('utilisateurs')
            ->select('id', 'email', 'nom', 'prenom', 'mot_de_passe')
            ->where('id', '=', $id)
            // ->where('mot_de_passe','=',$oldpassword)
            ->get();
        foreach ($check as $users) {
            if (Hash::check($oldpassword, $users->mot_de_passe)) {
                $user = DB::table('utilisateurs')
                    ->where('id', '=', $id)
                    ->update(['nom' => $nom, 'prenom' => $prenom, 'mot_de_passe' => Hash::make($newpassword),]);
                if ($user) {
                    return response()->json(
                        [
                            'status' => 'sucess'
                        ]
                    );
                }
            } else {
                return response()->json(
                    [
                        'status' => 'fail'
                    ]
                );
            }
        }
    }


    public function usersSign($name, $lastname, $email, $password)
    {
        $check = DB::table('utilisateurs')
            ->select('email')
            ->where('email', '=', $email)
            ->get();
        if ($check->isEmpty()) {
            $user = DB::table('utilisateurs')
                ->insert([
                    'nom' => $name,
                    'prenom' => $lastname,
                    'email' => $email,
                    'mot_de_passe' => Hash::make($password),
                ]);
            return response()->json(
                [
                    'status' => 'success'
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => 'fail'
                ]
            );
        }
    }
    public function SelectParticipation($id)
    {
        $participation = DB::table('participations')
            ->join('utilisateurs', 'utilisateurs.id', '=', 'participations.id_utilisateur')
            ->join('tournois', 'tournois.id', '=', 'participations.id_tournoi')
            ->select('participations.id', 'tournois.nom', 'tournois.type', 'tournois.recompense', 'tournois.date_debut', 'tournois.date_fin')
            ->where('utilisateurs.id', '=', $id)
            ->get();
        return json_encode($participation);
    }

    public function addparticipation($utilisateur_id, $tournoi_id)
    {
        $check = DB::table('participations')
            ->select('id_tournoi', 'id_utilisateur')
            ->where('id_utilisateur', '=', $utilisateur_id)
            ->where('id_tournoi', '=', $tournoi_id)
            ->get();
        if ($check->isEmpty()) {
            $tournoi = DB::table('participations')
                ->insert([
                    'id_tournoi' => $tournoi_id,
                    'id_utilisateur' => $utilisateur_id
                ]);
            return response()->json(
                [
                    'status' => 'success'
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => 'fail'
                ]
            );
        }
    }
    public function destroyT($id)
    {
        $participation = DB::table('participations')
            ->where('id', '=', $id)
            ->delete();
        if ($participation) {
            return response()->json(
                [
                    'status' => 'success'
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => 'fail'
                ]
            );
        }
    }
}
