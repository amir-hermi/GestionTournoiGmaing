<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminParticipationController extends Controller
{
    public function participationList(){
        $participations = DB::table('participations')
            ->join('utilisateurs','utilisateurs.id','=','participations.id_utilisateur')
            ->join('tournois','tournois.id','=','participations.id_tournoi')
            ->select('participations.id','utilisateurs.nom as nom_utilisateur','utilisateurs.prenom','utilisateurs.email','tournois.nom as nom_tournoi','tournois.date_debut','tournois.date_fin')
            ->get();
        return view('shared.participationList',compact('participations'));
    }

    public function destroyParticipation($id){
        $users = DB::table('participations')
        ->where('id','=',$id)
        ->delete();
        return redirect()->route('participation')->with('success','Participation Deleted');
    
    }
}
