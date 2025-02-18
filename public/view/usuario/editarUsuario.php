<?php
require '../../../Entity/Usuario.php';  // ALTERE O DIRETÓRIO CONFORME SALVO NO SEU LOCAL


if (isset($_GET['id_usuario']) && !empty($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];

    $usuario = Usuario::buscarPorId($id_usuario);
    

    if (!$usuario) {
        echo '<script>alert("Usuário não encontrado!");</script>';
        echo "<meta http-equiv='refresh' content='0.5;url=listarUsuarios.php' />";
        exit;
    }
} else {
    echo '<script>alert("ID do usuário não fornecido!");</script>';
    echo "<meta http-equiv='refresh' content='0.5;url=listarUsuarios.php' />";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'senha' => password_hash($_POST['senha'], PASSWORD_BCRYPT),
    ];


    if (Usuario::atualizar($id_usuario, $dados)) {
        echo '<script>alert("Usuário atualizado com sucesso!");</script>';
        echo "<meta http-equiv='refresh' content='0.5;url=listarUsuarios.php' />";
    } else {
        echo '<script>alert("Erro ao atualizar o usuário. Tente novamente!");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="../../css/cadastro.css">
</head>
<body>
    <div class="container">
        <div class="card">
        <img src="../../assets/img/logo_img.png" alt="Logo" cl ass="logo"> <br></br>
            <h2>Editar Usuário</h2>
            <p>Edite todos os dados obrigatórios e clique em 'Atualizar' para confirmar as alterações.</p><br> 
            <form method="POST" action="editarUsuario.php?id_usuario=<?php echo $id_usuario; ?>">
                <input name="nome" type="text" placeholder="Nome" class="input" value="<?php echo $usuario['nome']; ?>" required><br></br>
                <input name="email" type="email" placeholder="Email" class="input" value="<?php echo $usuario['email']; ?>" required><br></br>
                <input name="senha" type="password" placeholder="Nova senha" class="input" required><br></br>
                <button type="submit" class="btn-email">Atualizar</button>
            </form>
        </div>
    </div>
</body>
</html>
