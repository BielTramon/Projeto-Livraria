<?php
session_start();
$conectar = mysql_connect('localhost','root','');
$banco = mysql_select_db('biblioteca pijamanetuno');

if (isset($_POST['cadastrar']))
{
  $codigo = $_POST['codigo'];
  $nome       = $_POST['nome'];
  $endereco      = $_POST['endereco'];
  $cidade      = $_POST['cidade'];
  $estado       = $_POST['estado'];
  $pais      = $_POST['pais'];
  $nacionalidade     = $_POST['nacionalidade'];
  
  //gravar no banco as informacoes
  $sql = "INSERT INTO autor (codigo,nome,endereco,cidade,estado,pais,nacionalidade)
          VALUES ('$codigo','$nome','$endereco','$cidade','$estado','$pais','$nacionalidade')";

  $resultado = mysql_query($sql);
  
  if ($resultado === TRUE)
  {
     echo 'Cadastro realizado com Sucesso';
  }
  else
  {
     echo 'Erro ao gravar dados.';
  }
}
// ---------------------------------------------

if (isset($_POST['excluir']))
{
   $codigo = $_POST['codigo'];
   $nome       = $_POST['nome'];
   $endereco      = $_POST['endereco'];
   $cidade      = $_POST['cidade'];
   $estado       = $_POST['estado'];
   $pais      = $_POST['pais'];
   $nacionalidade     = $_POST['nacionalidade'];
  
  $sql = "DELETE FROM autor WHERE codigo = '$codigo'";
          
  $resultado = mysql_query($sql);

  if ($resultado === TRUE)
  {
     echo 'Excluido com Sucesso';
  }
  else
  {
     echo 'Erro ao excluir dados.';
  }
}

if (isset($_POST['alterar']))
{
   $codigo = $_POST['codigo'];
   $nome       = $_POST['nome'];
   $endereco      = $_POST['endereco'];
   $cidade      = $_POST['cidade'];
   $estado       = $_POST['estado'];
   $pais      = $_POST['pais'];
   $nacionalidade     = $_POST['nacionalidade'];

   $sql = "UPDATE autor SET codigo='$codigo','$nome','$endereco','$cidade','$estado','$pais','$nacionalidade'";

  $resultado = mysql_query($sql);

  if ($resultado === TRUE)
  {
     echo 'Dados alterados com Sucesso';
  }
  else
  {
     echo 'Erro ao alterar dados.';
  }
}

if (isset($_POST['pesquisar']))
{
   $sql = mysql_query("SELECT codigo,nome,endereco,cidade,estado,pais,nacionalidade FROM autor");

   echo "<b>Usuarios Cadastrados:</b><br><br>";
   while ($dados = mysql_fetch_object($sql))
	{
      echo "codigo     :".$dados->codigo." ";
      echo "nome  :".$dados->nome." ";
      echo "endereco :".$dados->endereco." ";
      echo "cidade :".$dados->cidade." ";
      echo "estado  :".$dados->estado." ";
      echo "pais :".$dados->pais." ";
      echo "nacionalidade :".$dados->nacionalidade." <br>";
	}
}
?>
