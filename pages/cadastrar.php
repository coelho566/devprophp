<header class="container">
    <h1>Cadastrar</h1>
</header>
<section class="container cadastro">
<?php
 
 $usuarios = new Usuarios();
 $msg ="";   
 if(!empty($_POST['nome'])){
     $nome = addslashes($_POST['nome']);
     $login = addslashes($_POST['login']);
     $senha = $_POST['senha'];
     $csenha = $_POST['csenha'];
     $status = addslashes($_POST['opcao']);
   
        if($usuarios->cadastrar($nome, $login, $senha, $status)){

            header("Location: home");
            exit;

        }else{

            $msg = "Usuario já existe!";
        }
 }

?>    

<form method="POST" class="formulario" onsubmit="return validar()" >

    <div class="campos">
        <label>Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome" ><br>
        <span>*Campo obrigatório, deve possuir ao menos 3 caracteres!</span>
    
        <label >Login:</label>
        <input type="text" name="login" id="login" placeholder="Login">
        <span>*Campo obrigatório, deve possuir entre 5 e 10 caracteres!</span>
    
        <label>Senha:</label>
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <span>*Campo obrigatório, deve possuir entre 5 e 10 caracteres!</span>
    
        <label>Confirmar Senha:</label>
        <input type="password" name="csenha" id="csenha" placeholder="Confirmar senha">
        <span>*Senhas não correspoden!</span>
        <label for="">Status:</label>
        <select name="opcao" >
            <option value="1">Ativos</option>
            <option value="2">Inativos </option>
        </select>
    </div>
    <div class="acoes">
        <div class="acoes-btn">
            <input type="submit" value="Salvar">
            <input type="reset" value="Limpar">
            <a href="home">Retornar</a>
        </div>
    </div>

</form>
<?php
echo $msg;

?>

</section>
