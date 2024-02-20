<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\locataire as locataires;
use GuzzleHttp;


class LocataireController extends Controller
{

    public  function index()
     {
        $locataire=locataires::select("*")
                    ->where('locataires.isActive','=','0')
                    ->get();
        return view('dashboard.index', ['locataire'=>$locataire]);
     }

    public  function historiques()
     {
        $locataire=locataires::all();
        return view('dashboard.data-tables', ['locataire'=>$locataire]);
     }

    public function store(Request $request)
    {
        $model = new locataires();
        $model->nom=$request->input('nom');
        $model->prenom=$request->input('prenom');
        $model->telephone=$request->input('tel');
        $model->description_appartement=$request->input('description');
        $model->avance=$request->input('avance');
        $model->caution_soneb=$request->input('caution');
        $model->loye_paye=$request->input('loye_paye');
        $model->date_debut=$request->input('date_debut');
        $model->date_fin=$request->input('date_fin');
        $model->save();

        $locataire=locataires::select("*")
                    ->where('locataires.isActive','=','0')
                    ->get();
        return view('dashboard.index', ['locataire'=>$locataire]);


    }
     

     public function edit ($id)
     {
        

    $model=locataires::select('*')->where('locataires.id',$id)->get();
       return view('dashboard.page_modif',['model'=>$model]);

     }

     public function update(Request $request )
     {

        $loca=locataires::find($request->input('id_locataire'));
        
        $loca->nom=$request->input('nom');
        $loca->prenom=$request->input('prenom');
        $loca->telephone=$request->input('tel');
        $loca->description_appartement=$request->input('description');
        $loca->avance=$request->input('avance');
        //$loca->caution_soneb=$request->input('caution_soneb');
        $loca->loye_paye=$request->input('loye_paye');
        $loca->date_debut=$request->input('date_debut');
        $loca->date_fin=$request->input('date_fin');
        $loca->save();

            $locataire=locataires::select("*")
                    ->where('locataires.isActive','=','0')
                    ->get();
            return view('dashboard.index', ['locataire'=>$locataire]);

    }
    public function destroy($id)
    {
         $model = locataires::select("*")->where('id',$id)->first();

         $model->isActive = '1';
         $model->save();
        return redirect()->back()->withStatus(__(''));
    }

   
}
