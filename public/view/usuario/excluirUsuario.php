<?php
require '../../../Entity/Usuario.php'; // ALTERE O DIRETORIO CONFORME SALVO NO SEU LOCAL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['id_usuario']) && !empty($_POST['id_usuario'])) {
        $id_usuario = $_POST['id_usuario'];


        if (Usuario::excluir($id_usuario)) {
            echo '<script>alert("Usuário excluído com sucesso!");</script>';
            echo "<meta http-equiv='refresh' content='0.5;url=listarUsuarios.php' />"; 
        } else {
            echo '<script>alert("Erro ao excluir o usuário. Tente novamente!");</script>';
            echo "<meta http-equiv='refresh' content='0.5;url=listarUsuarios.php' />"; 
        }
    }
}
?>
