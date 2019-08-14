<?php
    $usuario = new Usuarios();
    $msg = "";

    if(!empty($_POST['login'])){
        $login = addslashes($_POST['login']);
        $senha = $_POST['senha'];
        
            if($usuario->login($login, $senha)){
    
                header("Location: home");
                exit;
    
            }else{
                $msg = "Login ou senhas inválidos!";
            }        
    }

?>
<section>
    <div class="login">
        <img src="assets/imagens/icons8-rebel-96.png" alt="">
    <form method="POST">
        <div class="campos">
            <input type="text" name="login" id="log" placeholder="Login" required >
        </div>
        <div class="campos">
            <input type="password" name="senha" id="log" placeholder="Senha" required>
        </div>
            <input type="submit" value="Entrar">
    </form>
    <?php echo $msg ;  ?>
    </div>
</section>