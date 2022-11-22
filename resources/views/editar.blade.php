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
                align-items:center;
                justify-content:center;
            }

            .box-login{
                width:400px;
                background-color:#4bced3;
                border-radius:30px;
            }
            form{
                height:100%;
                text-align:center;
                padding:20px;
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
                width:70px;
                border:2px solid #62e9ef;
                cursor:pointer;
            }
        </style>
    </head>
    <body>
            <div class="container">
                <div class="box-login">
                    <form action="{{route('painel.editar.post')}}" method="POST">
                    {{csrf_field()}}
                    <h2 style="text-align:center;">Edite a Pessoa</h2>
                    <label for="">Nome</label>
                        <input type="text" name="nome" placeholder="Seu Email de login..." value="{{$nome}}"/>
                        <label for="">Idade</label>
                        <input type="number" name="idade" placeholder="Sua Senha..." value="{{$idade}}"/>
                        <input type="hidden" name="id_usuario" value="{{$id_usuario}}">
                        <input type="hidden" name="id_pessoa" value="{{$id_pessoa}}">
                        <input type="submit" name="atualizar_pessoa" value="Atualizar"/>
                    </form>
                </div>
            </div>
    </body>
</html>
