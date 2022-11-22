<?php

	namespace App\Http\Controllers;
    
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\Usuario;
    use App\Models\Pessoa;
    use App\Http\Controllers\PessoaController;
	
	class UsuarioController extends Controller
	{
		
		public static function index(){
            return view('login');
		}


        public function logar(Request $req){
            if($req->has('logar')){
                $email = $req->input('email');
                $senha = $req->input('senha');
                $retorno = false;
                $usuarios = new Usuario;
                $usuario = $usuarios->where('email',$email)->get();
                if($usuario->count() > 0){
                    $senha = $usuarios->where('senha',$senha)->get()->first();
                    $data = $senha;
                    if($senha->count() > 0){
                        echo '<script>alert("Login Realizado com sucesso!")</script>';
                        $_SESSION['logado'] = true;
                        $_SESSION['id'] = $senha->id_usuario;
                        $retorno = true;
                    }else{
                        echo '<script>alert("falha ao logar, Revise suas informações")</script>';
                    }
                }else{
                    echo '<script>alert("falha ao logar, Revise suas informações")location.href="/"</script>';
                }

                if($retorno){
                   //print_r($senha->id_usuario);
                    echo '<script>location.href="'.INCLUDE_PATH.'painel/'.$senha->id_usuario.'"</script>';
                }else{
                    return view('login');
                }
                

            }
        }

        public function listar($id){
            $pegarPessoas = new Pessoa;
            $listaPessoas = $pegarPessoas::all();
            $data['listapessoas'] = $listaPessoas;
            $data['id'] = $id;
            return view('painel',$data);
        }
        public function criar_pessoa(Request $req){
            if($req->has('cadastrar_pessoa')){
                $nome = $req->input('nome');
                $idade = $req->input('idade');
                $id_usuario = $req->input('id_usuario');
                
                $pessoa = new Pessoa();
                $pessoa->nome = $nome;
                $pessoa->idade = $idade;
                $pessoa->id_usuario = $id_usuario;
                $pessoa->save();
                echo '<script>alert("Cliente Cadastrado Com Sucesso!!!")</script>';
                echo '<script>location.href="'.INCLUDE_PATH.'painel/'.$id_usuario.'"</script>';
            }
        }

        public function excluir_pessoa($id,$id_usuario){
            $pessoa = new pessoa;
            $pessoa->where('id_pessoa',$id)->delete();
            echo '<script>alert("Deletado com sucesso!!!")</script>';
            echo '<script>location.href="'.INCLUDE_PATH.'painel/'.$id_usuario.'"</script>';
        }

        public function editar_pessoa($id,$id_usuario){
            $pessoa = new Pessoa;
            $pessoaEdite = $pessoa->where('id_pessoa',$id)->get()->first();
            $data['id_pessoa'] = $pessoaEdite->id_pessoa;
            $data['nome'] = $pessoaEdite->nome;
            $data['idade'] = $pessoaEdite->idade;
            $data['id_usuario'] = $id_usuario;
            return view('editar',$data);
        }

        public function editar_pessoa_single(Request $req){
            if($req->has('atualizar_pessoa')){
                $nome = $req->input('nome');
                $idade = $req->input('idade');
                $id_usuario = $req->input('id_usuario');
                $id_pessoa = $req->input('id_pessoa');
                
                $pessoa = new Pessoa();
                $pessoa->where('id_pessoa',$id_pessoa)->update(['nome'=>"$nome",'idade'=>"$idade"]);
                echo '<script>alert("Pessoa atualizada com sucesso!!!")</script>';
                echo '<script>location.href="'.INCLUDE_PATH.'painel/'.$id_usuario.'"</script>';
            }
        }

        public function sair_pessoa(){
            session_destroy();
            echo '<script>alert("Saindo do Perfil!!!")</script>';
            echo '<script>location.href="'.INCLUDE_PATH.'"</script>';
        }
	}
?>