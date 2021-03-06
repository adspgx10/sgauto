<?php
require('../Includes/conecta.php');
require('../CRUDs/banco_instrutor.php');
include '../Controllers/logica_usuario.php';
verificaUsuario();

$id = $_POST["id"];
$nome = $_POST["nome_instrutor"];
$cpf = $_POST["cpf_instrutor"];
$rg = $_POST["rg_instrutor"];
//$nacto = $_POST["aniversario_instrutor"];
$endereco = $_POST["endereco_instrutor"];
$cidade = $_POST["cidade_instrutor"];
$estado = $_POST["estado_instrutor"];
$tel = $_POST["tel_instrutor"];
$cel = $_POST["cel_instrutor"];
$email = $_POST["email_instrutor"];

$data = implode('-',array_reverse(explode('/',$_POST['aniversario_instrutor'])));

if(alterarInstrutor($conexao, $id, $nome, $cpf, $rg, $data, $endereco, $cidade, $estado, $tel, $cel, $email)){
     $_SESSION["success"] = "Atualizado com sucesso";
    header('Location: ../Views/listar_instrutor.php');
	die();
} else {
	$msg = mysqli_error($conexao);
	?>
	<p class="text-danger">Erro ao alterar dados do <?=$nome?>: <?=$msg?></p>
<?php
}
require('../Includes/rodape.php');
?>