<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
      body{
        font-family: Arial, Helvetica, sans-serif;
        background-image: linear-gradient(45deg,DodgerBlue, red);
      }
      div{
        background-color: rgba(0, 0, 0,0.10);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        padding: 80px;
        border-radius: 15px;
        color: black ;
      }
       
      input{
        padding: 15px;
        border: none;
        outline: none;
        font-size: 15px;
      }
    </style>
    </head>
<body>
    <center>
     <div>   <h1>LOGIN</h1>
        <form id="login" action="logado.php" method="POST">
            Login: <input type="text" name="login" required placeholder ="Digite o login"><br><br>
            Senha: <input type="password" name="senha" required placeholder = "Digite a senha" ><br><br>
            <input type="submit" id="entrar" value="Entrar">
    </div>
        </form>
    </center>
</body>
</html>
