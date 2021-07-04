<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\tournois;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminTournamentController extends Controller
{
    function tournamantlist(){
        $tournoips4 = DB::table('tournois')
            ->join('games', 'tournois.id_game', '=', 'games.id')
            ->select('tournois.id','tournois.nom','tournois.type','tournois.image', 'tournois.description','tournois.recompense','tournois.date_debut','tournois.date_fin','tournois.id_game','games.nom as gameName','games.platforme_id')
            ->where('games.platforme_id','=','1')
            ->get();
        $tournoipc = DB::table('tournois')
            ->join('games', 'tournois.id_game', '=', 'games.id')
            ->select('tournois.id','tournois.nom','tournois.type','tournois.image', 'tournois.description','tournois.recompense','tournois.date_debut','tournois.date_fin','tournois.id_game','games.nom as gameName','games.platforme_id')
            ->where('games.platforme_id','=','2')
            ->get();
        $tournoixbox = DB::table('tournois')
            ->join('games', 'tournois.id_game', '=', 'games.id')
            ->select('tournois.id','tournois.nom','tournois.type','tournois.image', 'tournois.description','tournois.recompense','tournois.date_debut','tournois.date_fin','tournois.id_game','games.nom as gameName','games.platforme_id')
            ->where('games.platforme_id','=','3')
            ->get();
        $tournoimobile = DB::table('tournois')
            ->join('games', 'tournois.id_game', '=', 'games.id')
            ->select('tournois.id','tournois.nom','tournois.type','tournois.image', 'tournois.description','tournois.recompense','tournois.date_debut','tournois.date_fin','tournois.id_game','games.nom as gameName','games.platforme_id')
            ->where('games.platforme_id','=','4')
            ->get();
        return view('shared.tournamentList',compact('tournoips4','tournoipc','tournoixbox','tournoimobile'));

    }
    public function create()
    {
        return view('shared.createTournament');
    }
    public function update($id)
    {
        $tournoi = tournois::find($id);
        return view('shared.updateTournament',compact('tournoi'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        'type'=>'required',
        'photo'=>'required',
        'description'=>'required',
        'reward'=>'required',
        'startdate'=>'required',
        'enddate'=>'required',
        'game'=>'required',
        ]);
        if($request->hasFile('photo')) {
            $file = $request->file('photo');
            $new_file=time().$file->getClientOriginalName();
            $file->move('storage/photos',$new_file);
        }
        $query =tournois::create([
            "nom" => $request->name,
            "type" => $request->type,
            "image" => 'storage/photos/'.$new_file,
            "description" => $request->description,
            "recompense" => $request->reward,
            "date_debut" => $request->startdate,
            "date_fin" => $request->enddate,
            "id_game" => $request->game,

        ]);
        if($query){
            return redirect()->route('tournaments')->with('success','Tournament add with success');
        }else{
            return back()->with('fail','Faild to add tournament');
        }

    }

public function updateStore(Request $request, $id){
    $request->validate([
        'name'=>'required',
        'type'=>'required',
        'photo'=>'required',
        'description'=>'required',
        'reward'=>'required',
        'startdate'=>'required',
        'enddate'=>'required',
        'game'=>'required',
    ]);
    $tournoi =tournois::find($id);
    if($request->hasFile('photo')) {
        $file = $request->file('photo');
        $new_file=time().$file->getClientOriginalName();
        $file->move('storage/post',$new_file);
        $tournoi->image = 'storage/post/'.$new_file;
    }
    $tournoi->nom = $request->name;
    $tournoi->type = $request->type;
    $tournoi->description =  $request->description;
    $tournoi->recompense =  $request->reward;
    $tournoi->date_debut =  $request->startdate;
    $tournoi->date_fin =  $request->enddate;
    $tournoi->id_game =  $request->game;
    $tournoi->update();
    if($tournoi){
        return redirect('tournaments')->with('success','Tournament Updated');
    }else{
        return back()->with('fail','Faild to add tournament');
    }
}
    public function destroy($id)
    {
        $tournoi = tournois::find($id);
        $tournoi->destroy($id);
        if($tournoi){
            return redirect()->route('tournaments')->with('success','Tournament Deleted');
        }else{
            return back()->with('fail','Cannot delete this tournament');
        }

    }



}
