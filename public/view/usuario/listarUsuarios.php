<?php

require '../../../Entity/Usuario.php';  //ALTERE OS DIRETORIOS CONFORME ESTIVER SALVO NO SEU LOCAL

    $usuarios = Usuario::listar()->fetchAll(PDO::FETCH_ASSOC);

    ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTAR USUÁRIOS</title>
    <link rel="stylesheet" href="../../../public/css/listarU.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="listarU-logo">
            <img src="../../../public/assets/img/Ativo 2.png " alt="logo tweeb">
        </div> 
    </header>

    <!-- Barra de departamentos -->
    <section class="listarU-departments-bar">
        <div class="listarU-department">
        </div>
    </section>    

    <section>
        <div class="listarU-titulo"> <h3>CLIENTES CADASTRADOS</h3>
        </div>


        <div class="listarU-search-box">
            <form action="" onsubmit="event.preventDefault(); filterTable();">
                <div class="listarU-search-container">
                    <button type="submit" class="listarU-search-btn">
                        <i class="bx bx-search"></i> <!-- Ícone da lupa -->
                    </button>
                    <input type="text" id="searchInput" class="listarU-srch" placeholder="Buscar">
                </div>
            </form>
        </div>
        
        

        <!-- Tabela para listar clientes cadastrados -->
    <div class="listarU-container">    
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Alterar</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($usuarios as $usuario) {
                echo '
                <tr>
                    <td>' . $usuario['id_usuario'] . '</td>
                    <td>' . $usuario['nome'] . '</td>
                    <td>' . $usuario['email'] . '</td>
                    <td>
                        <div class="td_botao">
                            <form action="editarUsuario.php" method="post">
                                <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '">    
                                <button type="submit" class="listarU-edit-btn">
                                    <img src="../../../public/assets/img/edit-3.png" alt="Editar" class="listarU-edit-icon">
                                </button>
                            </form>
                    
                            <form action="excluirUsuario.php" method="post">
                                <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '"> 
                                <button type="submit" class="listarU-delete-btn">
                                    <img src="../../../public/assets/img/trash-2.png" alt="Excluir" class="listarU-delete-icon">
                                </button>
                            </form>
                    </td>
                </tr>';
            }
        ?>
    </tbody>
</table>
    </div>
    </section>

</body>
</html>
