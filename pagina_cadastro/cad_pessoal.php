<?php 
include ("func_espirito.php");

conec_inicio();
if(isset($_GET["acao"])):$acao= $_GET["acao"];
endif;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastrar</title>
</head>
<body>
<div id="corpo">

<div id="topo">
	<?php include "baner_topo.php"?>
</div>

<div id="menusuperior">
	<?php include "menu.php"?>
</div>
<?php


if (isset($acao) && $acao == "cadastro") {
	
	$nome = $_POST["nome"];
	$endereco = $_POST["endereco"];
	$telefone = $_POST["telefone"];
	$email = $_POST["email"];
	
	//print $nome;
	$sql_verif = mysql_query("SELECT * FROM pessoal WHERE Nome = '".$nome."' "); 
        if (mysql_num_rows($sql_verif) == 1) { 
            echo "<script language='javascript'>alert('N�o foi possivel realizar o cadastro no momento pois o usuario ja existe')</script>"; //se sim mostra mensagem 
			exit;
        }
	if(inserir_cadastro($nome, $telefone, $email, $endereco)){
		echo "<script language='javascript'>alert('Cadastro efetuado com sucesso')</script>";
	}
	else{
		echo "<script language='javascript'>alert('N�o foi possivel realizar o cadastro no momento')</script>";
	}
	
		
		
	/*if ($sql&&$sq) {
		
	echo "<script language='javascript'>alert('Cadastro efetuado com sucesso')</script>";
	
	} 
	else {
	echo "<script language='javascript'>alert('N�o foi possivel realizar o cadastro no momento')</script>";
	}*/
	}

?>
<table align="center"  width="500">
<tr><td align="center"><h1>Cadastro</h1></td></tr>
<tr><td align="center"><h2>Dados Pessoais</h2></td></tr>
</table><br />
<table align="center" width="500" border="10">
<form name="form1" id="form1" method="post" action="cad_pessoal.php?acao=cadastro">
<tr><td width="67"><p><em>Nome:</em></td><td width="421"><em>
  <input type="text" name="nome"  width="421" size="121"/>
  </p>
</em></td></tr>
<tr><td><p><em>Endere&ccedil;o:</em></td><td width="421"><em>
  <input type="text" name="endereco"  width="421" size="121"/>
  </p>
</em></td></tr>
<tr><td><p><em>Telefone:</em></td><td width="421"><em>
  <input type="text" name="telefone"  width="421" size="121"/>
  </p>
</em></td></tr>
<tr><td><p><em>E-mail:</em></td><td width="421"><em>
  <input type="text" name="email"  width="421" size="121"/>
  </p>
</em></td></tr>
<tr><td><em>
  <input type="submit" name="cad" id="cad" value="cadastro"/>
</em></td></tr>

</form>
</table>

</div>
</body>
</html>