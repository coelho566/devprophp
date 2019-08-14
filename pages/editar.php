<header class="container">
    <h1>Editar</h1>
</header>
<section class="container cadastro">

<?php
$usuarios = new Usuarios();

if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $login = addslashes($_POST['login']);
    $senha = addslashes($_POST['senha']);
    $status = addslashes($_POST['opcao']);

    if($usuarios->editar($nome, $login, $senha, $status, $_GET['id'])){
        
        header("Location: home");
        exit;

    }else {

        echo "Erro";
        
    }
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $info = $usuarios->getInfo($_GET['id']);
}

?>

<form method="POST" class="formulario" onsubmit="return validar()">

    <div class="campos">
        <label>Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $info['nome'];?>">
        <span>*Campo obrigatório, deve possuir ao menos 3 caracteres!</span>

        <label >Login:</label>
        <input type="text" name="login" id="login" value="<?php echo $info['login'];?> ">
        <span>*Campo obrigatório, deve possuir entre 5 e 10 caracteres!</span>

        <label>Senha:</label>
        <input type="password" name="senha" id="senha" value="<?php echo $info['senha'];?>">
        <span>*Campo obrigatório, deve possuir entre 5 e 10 caracteres!</span>

        <label>Confirmar Senha:</label>
        <input type="password" name="csenha" id="csenha" value="<?php echo $info['senha'];?>">
        <span>*Senhas não correspoden!</span>

        <label for="">Status:</label>
        <select name="opcao" >
            <option value="1" <?php echo ($info['status']=='1')?'selected="selected"':''; ?>>Ativo</option>
            <option value="2" <?php echo ($info['status']=='2')?'selected="selected"':''; ?>>Inativo</option>
        </select>
    </div>
    
    <div class="acoes">
        <div class="acoes-btn">
        <input type="submit" value="Salvar">
        <a href="home">Retornar</a>
        </div>
    </div>
</form>
</section>