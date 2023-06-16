<?php
session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION['nome'])) {
    header("Location: login.php"); // Redireciona para a página de login se não estiver autenticado
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Realize a conexão com o banco de dados
    $conexao = mysqli_connect('localhost', 'root', '', 'projetoa3','3306');

    // Verifique se a conexão foi estabelecida corretamente
    if (!$conexao) {
        die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
    }

    // Recupere os dados do formulário
    $novasenha = $_POST['nova_senha'];
    $confirmarsenha = $_POST['confirmar_senha'];

    // Verifique se a nova senha e a confirmação correspondem
    if ($novasenha !== $confirmarsenha) {
        die("A nova senha e a confirmação da senha não correspondem.");
    }

    // Execute a lógica para atualizar a senha no banco de dados
    $nomeUsuario = $_SESSION['nome']; // Assumindo que o campo 'nome' é usado como identificador único na tabela de usuários
    $senhaHash = $novasenha;

    $sql = "UPDATE login SET senha = '$senhaHash' WHERE nome = '$nomeUsuario'";
    if (mysqli_query($conexao, $sql)) {
        echo "Senha atualizada com sucesso!";
        echo '<br><br>';
        echo '<a href="login.php">Voltar para a página de login</a>'; // Botão para voltar para a página de login
    } else {
        echo "Erro ao atualizar a senha: " . mysqli_error($conexao);
    }

    // Feche a conexão com o banco de dados
    mysqli_close($conexao);
}
?>

<html>
<body>
<style>

body{
  font-family: Arial, Helvetica, sans-serif;
  background-image: linear-gradient(45deg,DodgerBlue,red);
}
div{
  background-color: rgba(0, 0, 0,0.10);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  padding: 80px;
  border-radius: 15px;
  color:;
}
 
input{
  padding: 15px;
  border: none;
  outline: none;
  font-size: 15px;
}
</style>
<body>
    <div>
<center>
   <!-- Exiba o formulário de alteração de senha -->
   <h1>Alterar Senha</h1>
   <form method="POST" action="alterarsenha.php">
       <label for="nova_senha">Nova senha:<br></label>
       <input type="password" name="nova_senha" id="nova_senha" required>

       <label for="confirmar_senha"><br><br>Confirmar nova senha:</label><br>
       <input type="password" name="confirmar_senha" id="confirmar_senha" required>

       <input type="submit" value="Alterar Senha">
</div>
   </form>

   </center>
</body>
</html>
