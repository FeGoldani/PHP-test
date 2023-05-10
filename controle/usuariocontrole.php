<?php
session_start();
session_unset();//limpando sessões anteriores
include'../modelo/usuario.class.php';
include'../dao/usuariodao.class.php';
include'../util/validacao.class.php';

if(isset($_GET['op'])){
switch($_GET['op']){
	case 'cadastrar':
	if(isset($_POST['txtNome']) &&
	   isset($_POST['txtTel']) &&
	   isset($_POST['txtEmail']) &&
	   isset($_POST['selTipo']) ){
		$nome = $_POST['txtNome'];
		$tel = $_POST['txtTel'];
		$email = $_POST['txtEmail'];
		$tipo = $_POST['selTipo'];
		
		$erros = array();
		if(!Validacao::testarNome($nome))
			$erros[]='Nome incorreto';
		
		if(count($erros)==0){
		$u = new Usuario();
		$u->nome = $nome;
		$u->tel = $tel;
		$u->email = $email;
		$u->tipo = $tipo;
	
	/*
	Enviando o objeto $u para o BD
	*/
		$uDAO = new UsuarioDAO();
		$uDAO->cadastrarUsuario($u);
	
		$_SESSION['u'] = serialize($u);
		header("location:../visao/guiresposta.php");
		}else{
			$_SESSION['erros'] = serialize($erros);
			header("location:../visao/guierro.php");
		}//fecha else count do array
	   }else{
		   echo "ERROR!";
	   }//fecha else isset cadastrar
	break;//fecha case cadastrar   

	case 'consultar':
	
	$uDAO = new UsuarioDAO();
	$array = array();
	$array = $uDAO->buscarUsuarios();
	
	$_SESSION['usuarios'] = serialize($array);
	header("location:../visao/guiconsulta.php");
	
	break;//fecha consultar
	case'deletar';
	if(isset($_REQUEST['txtEmail'])){
		$uDAO = new UsuarioDAO();
		$uDAO->deletarUsuario($_REQUEST['txtEmail']);
		header('location:../controle/usuariocontrole.php?op=consultar');
	}else{
		echo 'email não existe!';
	}//fecha else
	break;
}//fecha switch 
}else{
	echo 'variavel op não existe';
}//fecha else isset OP
?>