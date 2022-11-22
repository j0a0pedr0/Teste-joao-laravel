







<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    public function criar_pessoa(Request $req){
        if($req->has('cadastrar_pessoa')){
            /*$nome = $req->input('nome');
            $email = $req->input('email');
            
            $clientes = new Clientes();
            $clientes->nome = $nome;
            $clientes->email = $email;
            $clientes->save();*/
            echo '<script>alert("Cliente Cadastrado Com Sucesso!!!")</script>';
            //echo '<script>location.href="http://localhost/clientes_laravel_eu/public/"</script>';
        }
    }
   
}
?>