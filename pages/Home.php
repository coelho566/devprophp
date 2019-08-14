<?php
$usuarios = new Usuarios();


if(!empty($_SESSION['devpro'])){

    $filtros = array(
        'nome' => '',
        'status' => ''
    );
    
    if(isset($_GET['filtros']) && !empty($_GET['filtros'])){
        $filtros = $_GET['filtros'];
    }

}else{

    header("Location: login");
    exit;
}
?>
<header class="container">
    <h1>Listagem de usuários</h1>
    <a href="sair">Sair</a>
</header>
<section class="container buscar">

<form method="GET" class="formulario">

    <div class="campos">
        <div class="campos-op">
            <label for="nome">Nome:</label>
            <input type="text" name="filtros[nome]" id="log" placeholder="Nome">
        </div>
        <label for="">Status:</label>
        <select name="filtros[status]" >
            <option value="0">Todos</option>
            <option value="1" <?php echo ($filtros['status']=='1')?'selected="selected"':''; ?>>Ativos</option>
            <option value="2" <?php echo ($filtros['status']=='2')?'selected="selected"':''; ?>>Inativos </option>
        </select>
    </div>
    <div class="acoes">
        <div class="acoes-btn">
            <input type="submit" value="Buscar">
            <input type="reset" value="Limpar">
            <a href="cadastrar">Novo</a>
        </div>
    </div>
    <div class="clear"></div>
</form>
</section>

<section class="container tabela">
    <div class="linha"></div>
    <table>
        <tr>
            <th>Nome</th>
            <th>Login</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    <?php
        $info = $usuarios->filtros($filtros);
        foreach ($info as $value):
    ?>  
        <tr class="info">
            <td><?php echo $value['nome']?></td>
            <td><?php echo $value['login']?></td>
            <td>
                <?php 
                if($value['status'] == 1){
                    echo "Ativo";
                }else{
                    echo "Inativo";
                }
            ?>
            </td>
            <td><a href="editar?id=<?php echo $value['id']; ?>">Editar</a>
            <a href="excluir?id=<?php echo $value['id'];?>" onclick="return excluir()">Excluir</a></td>
        </tr>
    <?php endforeach;?>  
    </table>

</section>