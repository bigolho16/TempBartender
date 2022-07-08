<?php

namespace App\Http\Controllers\Req;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listagem;
use App\Models\Listagem2;
use DB;

class BarmanDatas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listagem = Listagem::all(); // ou \App\Models\Listagem
        $listagem2= Listagem2::all();// ou \App\Models\Listagem2

        $dados1 = json_encode($listagem); 
        $dados2 = json_encode($listagem2); 
        echo json_encode(array_merge(json_decode($dados1, true),json_decode($dados2, true)));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update() // não passei parametro pois não da pra mudar rota do blade.php do laravel com javascript!!!
    {
        // dd($_REQUEST);
        $ret = 0;

        if (isset($_REQUEST["coquetel"])) {
            $ret = DB::update("update coqueteis set coquetel='".$_REQUEST['coquetel']."' where id_coqueteis='".$_REQUEST['id_coqueteis']."'");
        }else if(isset($_REQUEST["quantidade"])) {
            $ret = DB::update("update quantos set quantidade='".$_REQUEST['quantidade']."' where id_quantos='".$_REQUEST['id_quantos']."'");

        }

        if ($ret) {
            return redirect()->route('barman')->with("success", "Atualização feita com sucesso! ✌(ツ)");
        }else { return redirect()->route('barman')->with("error", "Falha ao atualizar! :("); }

        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */
    public function destroy()
    {
        $listagem2  = Listagem2::where('id_quantos', $_REQUEST['id_quantos'])->delete();
        $listagem   = Listagem::where('id_coqueteis', $_REQUEST['id_coqueteis'])->delete();

        
        return redirect()->route("barman")->with("success", "Exclusão feita com sucesso! ✌(ツ)");
        // DB::delete("DELETE quantos WHERE id_quantos="."'".$_REQUEST['id_quantos']."'");
        // DB::delete("DELETE coqueteis WHERE id_coqueteis="."'".$_REQUEST['id_coqueteis']."'");

        // Listagem2::destroy([$_REQUEST["id_quantos"]]); // deletar id quantos primeiro pois ele faz ligação "listagem"
        // Listagem::destroy([$_REQUEST["id_coqueteis"]]);

        // $listagem2.delete();
        // $listagem.delete();

        // print_r($_REQUEST);
    }

    // public function exclusao ()
    // {
    //     dd("ta caindo aqui");

    // }
}
