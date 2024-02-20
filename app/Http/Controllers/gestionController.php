<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Operation;
use App\Models\Adresse;
use Illuminate\Support\Facades\DB;

class gestionController extends Controller
{
    public  function index()
    {
        $client=User::where('isadmin','0')->where('isActive','1')->get();
        $depot = Operation::where('type','1')->where('statut','0')->get();
        $retrait = Operation::where('type','2')->where('statut','0')->get();
        $operation = Operation::all();

        return view('dashboard.index', ['client'=>$client,'depot'=>$depot,'retrait'=>$retrait,'operation'=>$operation]);
    }

    public  function historiques()
    {
        $operation = DB::table('operations')
            ->join('users', 'operations.userId', '=', 'users.id_compte')
            ->select('operations.*', 'users.*')
            ->get();
        return view('dashboard.data-tables', ['operation'=>$operation]);
    }

    public  function depot()
    {
        $operation = DB::table('operations')
            ->join('users', 'operations.userId', '=', 'users.id_compte')
            ->where('type','1')
            ->select('operations.*', 'users.nom','users.prenom','users.numero')
            ->orderBy('operations.created_at','desc')
            ->get();
        return view('dashboard.depot', ['operation'=>$operation]);
    }

    public  function retrait()
    {
        $operation = DB::table('operations')
            ->join('users', 'operations.userId', '=', 'users.id_compte')
            ->where('type','2')
            ->select('operations.*', 'users.nom','users.prenom','users.numero')
            ->orderBy('operations.created_at','desc')
            ->get();
        return view('dashboard.retrait', ['operation'=>$operation]);
    }

   public function destroy($id)
   {
        $model = User::where('id',$id)->first();

        $model->isActive = '0';
        $model->save();
       return redirect()->back()->withStatus(__('Supression effectuée avec succès'));
   }

   public function active($id)
   {
        $model = Operation::where('id',$id)->first();

        $model->statut = '0';
        $model->save();
       return redirect()->back()->withStatus(__('Opération effectuée avec succès'));
   }

   public function rejet($id)
   {
        $model = Operation::where('id',$id)->first();

        $model->statut = '2';
        $model->save();
       return redirect()->back()->withStatus(__('Rejet effectué avec succès'));
   }

   public function addAdresse(Request $request)
   {
        $model = new Adresse([
            'adminId' => auth()->user()->id,
            'adresse' => $request->input('adresse'),
        ]);
        $model->save();
       return redirect()->back()->withStatus(__('Rejet effectué avec succès'));
   }

   public function adresse()
   {
            $adresse = DB::table('adresses')
            ->join('users', 'adresses.adminId', '=', 'users.id')
            ->select('adresses.*', 'users.nom','users.prenom')
            ->orderBy('adresses.created_at','desc')
            ->get();
        return view('dashboard.list_adresse', ['adresse'=>$adresse]);
   }

   public function activeAdresse($id)
   {
        $model = Adresse::findOrFail($id);
        if($model->isActive == '0'){
            $model->isActive = '1';
            $model->save();

            Adresse::where('id', '!=', $id)->update(['isActive' => '2']);
        }
        else if($model->isActive == '1'){
            $model->isActive = '0';
            $model->save();

            Adresse::where('id', '!=', $id)->update(['isActive' => '0']);
        }

       return redirect()->back()->withStatus(__('Opération effectuée avec succès'));
   }




}
