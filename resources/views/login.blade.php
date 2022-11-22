<?php
    
    if(isset($_SESSION['logado']) == true){
        echo '<script>location.href="http://localhost/teste-joao-app/public/painel/'.$_SESSION['id'].'"</script>';
    }else{
        
    }
    

?>

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
                    <form method="POST">
                    {{csrf_field()}}
                        <input type="email" name="email" placeholder="Seu Email de login..."/>
                        <input type="password" name="senha" placeholder="Sua Senha..."/>
                        <input type="submit" name="logar" value="Entrar"/>
                    </form>
                </div>
            </div>
    </body>
</html>
