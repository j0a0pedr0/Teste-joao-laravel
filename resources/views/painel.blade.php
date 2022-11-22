<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>
        <style type="text/css">
            html,body {
                padding:0;
                margin:0;
                box-sizing:border-box;
                font-family: 'Nunito', sans-serif;
            }
            .container{
                height:100vh;
                width:100%;
                background-color:#afe0e2;
                display:flex;
                justify-content:center;
            }

            .box-painel{
                width:90%;
                height:60vh;
                background-color:#4bced3;
                border-radius:30px;
                margin-top:50px;
            }
            h2{
                width:100%;
                text-align:center;
            }
            h4{
                text-align:center;
            }
            h3{
                text-align:left;
            }
            form{
                width:100%;
                max-width:400px;
                text-align:center;
                padding:20px;
                margin:0 auto;
            }
            input{
                width:100%;
                height:40px;
                border-radius:20px;
                padding-left:9px;
                margin-bottom:17px;
            }
            input[type=submit]{
                display:block;
                margin:0 auto;
                border-radius:30px;
                padding:8px 12px;
                width:90px;
                border:2px solid #62e9ef;
                cursor:pointer;
            }
            .listagem{
                padding:13px;
                background-color:#35aeb2;

            }
            table{
                width:100%;
                border-collapse:collapse;
            }
            tr{
                border:2px solid black;
            }
            td{
                border:2px solid black;
            }
        </style>
    </head>
    <body>
            <div class="container">
                <div class="box-painel">
                    <h5><a style="font-size:25px;margin-left:12px;" href="painel/sair">sair da conta</a></h5>
                    <h2>Painel de Controle</h2>
                    <form  action="{{route('painel.post')}}" method="POST">
                    {{csrf_field()}}
                        <h4>Cadastrar Pessoas</h4>
                        <input type="text" name="nome" placeholder="Digite o Nome..."/>
                        <input type="number" name="idade" placeholder="Digite a Idade..."/>
                        <input type="hidden" name="id_usuario" value="{{$id}}">
                        <input type="submit" name="cadastrar_pessoa" value="Cadastrar"/>
                    </form>
                    <div class="listagem">
                        <h3>listagem de pessoas Cadastradas</h4>
                        <table>
                            <tr>
                                <td>Nome</td>
                                <td>Idade</td>
                                <td>Editar</td>
                                <td>Deletar</td>
                            </tr>
                            
                            @foreach($listapessoas as $cliente)
                            <tr>
                                <td>{{$cliente->nome}}</td>
                                <td>{{$cliente->idade}}</td>
                                <td style="text-align:center;"><a href="http://localhost/teste-joao-app/public/painel/editar/{{$cliente->id_pessoa}}/{{$cliente->id_usuario}}">Editar</a></td>
                                <td style="text-align:center;"><a href="http://localhost/teste-joao-app/public/painel/excluir/{{$cliente->id_pessoa}}/{{$cliente->id_usuario}}">Excluir</a></td>
                            </tr>
                            @endforeach    
                            
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>
