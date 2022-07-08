<?php

namespace App\Http\Controllers\Req;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coqueteis;
use App\Models\Quantos;
use DB;

class PedController extends Controller
{
    public function store(Request $request, Coqueteis $coqueteis, Quantos $quantos) {
        // foreach ($request->all) {
        //     $newArray = ($request->request);
        // }
        // $a = 1;
        

        $newArray = array_keys($request->all());
        
        $idArrays = [];
        for ($x=1; $x <= substr(end($newArray), -1); $x++) {
            // dd($_REQUEST["coquetel_".$a]);
            // $resultsQuant   = $coqueteis->insert([
            // "coquetel"         =>  $_REQUEST["coquetel_".$x]

            // ]);
            $resultsCoq                 =   $coqueteis->create([
                "coquetel"              =>  $_REQUEST["coquetel_".$x]

            ]);

            // echo ($x . " ");
            array_push($idArrays, $resultsCoq->id);
        }

        // dd($_REQUEST["quantidade_".$x+1]);
        $u = 1;
        for ($x=0; $x < substr(end($newArray), -1); $x++) {
            $sm = ($x + $u);
            // dd($_REQUEST["coquetel_".$a]);
            $resultsQuant               = $quantos->create([
                "quantidade"            =>  $_REQUEST["quantidade_".$sm],
                "id_quantos_coqueteis"  => $idArrays[$x]
            ]);
        }

        return redirect()->route("popbar")->with("success", "Pedido feito com sucesso, aguarde que irei fazer ✌(ツ)");


        // Instancia
        // $coqueteis = Coqueteis::class;

        // $coqueteis->coquetel = $request->prop1;
        // $table->prop2 = $request->prop2;
        // $table->prop3 = $request->prop3;
        // Inserindo os dados no DB
        // $table->save();
        // $category->create($request->all());
        // $category->save();

    }
}
