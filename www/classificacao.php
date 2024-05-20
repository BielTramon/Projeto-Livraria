<?php
session_start();
$conectar = mysql_connect('localhost','root','');
$banco = mysql_select_db('biblioteca pijamanetuno');

if (isset($_POST['cadastrar']))
{
  $codigo = $_POST['codigo'];
  $nome       = $_POST['nome'];

  //gravar no banco as informacoes
  $sql = "INSERT INTO classificacao (codigo,nome)
          VALUES ('$codigo','$nome')";

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
  
  $sql = "DELETE FROM classificacao WHERE codigo = '$codigo'";
          
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

   $sql = "UPDATE classificacao SET codigo='$codigo','$nome'";

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
   $sql = mysql_query("SELECT codigo,nome FROM classificacao");

   echo "<b>Usuarios Cadastrados:</b><br><br>";
   while ($dados = mysql_fetch_object($sql))
   {
    echo "codigo     :".$dados->codigo." ";
    echo "nome  :".$dados->nome. "<br>";
   }
}
?>
