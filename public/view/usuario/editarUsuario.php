<?php
require '../../../Entity/Usuario.php';  // ALTERE O DIRETÓRIO CONFORME SALVO NO SEU LOCAL


if (!isset($_GET['id_usuario']) || empty($_GET['id_usuario'])) {
    echo '<script>alert("ID inválido!");</script>';
    echo "<meta http-equiv='refresh' content='0.5;url=listarUsuarios.php' />";
    exit;
}


$id_usuario = $_GET['id_usuario'];
$usuario = Usuario::buscarPorId($id_usuario);


if (!$usuario) {
    echo '<script>alert("Usuário não encontrado!");</script>';
    echo "<meta http-equiv='refresh' content='0.5;url=listarUsuarios.php' />";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $dados = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
    ];

    
    if (!empty($_POST['senha'])) {
        if ($_POST['senha'] !== $_POST['confirmacao']) {
            echo '<script>alert("As senhas não coincidem!");</script>';
            exit;
        }
        $dados['senha'] = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    }

    
    if (Usuario::atualizar($id_usuario, $dados)) {
        echo '<script>alert("Usuário atualizado com sucesso!");</script>';
        echo "<meta http-equiv='refresh' content='0.5;url=listarUsuarios.php' />";
    } else {
        echo '<script>alert("Erro ao atualizar o usuário.");</script>';
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="../../../public/css/listarU.css">
</head>
<body>

    <section id="main-content">
        <header>
            <div class="listarU-logo">
                <img src="../../../public/assets/img/Ativo 2.png " alt="logo tweeb">
            </div>
        </header>

        <section class="listarU-departments-bar">
            <div class="listarU-department"></div>
        </section>

        <section>
            <div class="listarU-titulo"><h3>Editar Usuário</h3></div>

            <form action="editarUsuario.php" method="POST">
                <input type="hidden" name="id_usuario" value="<?= $usuario['id_usuario'] ?>">

                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" value="<?= $usuario['nome'] ?>" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= $usuario['email'] ?>" required>

                <label for="senha">Senha (Deixe em branco se não deseja alterar)</label>
                <input type="password" id="senha" name="senha">

                <label for="confirmacao">Confirmação de Senha</label>
                <input type="password" id="confirmacao" name="confirmacao">

                <button type="submit">Atualizar Usuário</button>
            </form>

        </section>
    </section>

</body>
</html>
