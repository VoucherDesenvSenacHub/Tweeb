    <?php
    require '../../../Entity/Usuario.php'; // ALTERE O DIRETORIO CONFORME SALVO NO SEU LOCAL

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dados = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'confirmacao' => $_POST['confirmacao'],
        ];
    
        if ($dados['senha'] != $dados['confirmacao']) {
            echo '<script>alert("Senha e confirmação de senha não batem! Tente novamente!");</script>';
            echo "<meta http-equiv='refresh' content='0.5;url=cadastro.php' />"; 
        } else {
            $usuario = new Usuario($dados);
    
            if ($usuario->cadastrar()) {
                echo '<script>alert("Usuário cadastrado com sucesso!");</script>';
                echo "<meta http-equiv='refresh' content='0.5;url=listar.php' />"; 
            } else {
                echo '<script>alert("Erro ao cadastrar usuário.");</script>';
                echo "<meta http-equiv='refresh' content='0.5;url=cadastro.php' />"; 

            }
        }
        exit;
    }
    

    ?>
    <!DOCTYPE html> 
    <html lang="pt-br"> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Cadastro</title> 
        <link rel="stylesheet" href="../../css/cadastro.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    </head> 
    <body> 
        <div class="container"> 
            <div class="card">
                <img src="../../assets/img/logo_img.png" alt="Logo" cl ass="logo"> 
                <h2>Crie sua conta</h2> 
                <p>Digite seu e-mail para criar sua conta</p> 
                <form method="POST" action="cadastro.php"> 
                    <input name='nome' type="text" placeholder="Nome" class="input"> 
                    <input name='email' type="email" placeholder="Email" class="input"> 
                    <input name='senha' type="password" placeholder="Digite sua senha" class="input"> 
                    <input name='confirmacao' type="password" placeholder="Confirme sua senha " class = "input"> 
                    <button type="submit" class="btn-email">Cadastre-se</button> 
                </form> 
                <p class="terms">Ao clicar em continuar, você concorda com nossos <a href="#">Termos de Serviço</a> e <a href="#">Política de Privacidade</a></p> 
            </div> 
        </div> 
    </body> 
    </html> 
