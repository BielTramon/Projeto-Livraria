<?php
session_start();
$conectar = mysql_connect('localhost','root','');
$banco = mysql_select_db('biblioteca pijamanetuno');

if (isset($_POST['cadastrar']))
{
   $codigo    = $_POST['codigo'];
   $titulo = $_POST['titulo'];
   $codcategoria     = $_POST['codcategoria'];
   $codclassificacao     = $_POST['codclassificacao'];
   $ano = $_POST['ano'];
   $edicao = $_POST['edicao'];
   $codautor        = $_POST['codautor'];
   $editora    = $_POST['editora'];
   $paginas      = $_POST['paginas'];
   $fotocapa = $_FILES['fotocapa'];
   $valor = $_POST['valor'];
   //criar pasta computador
   $diretorio = "fotos/";
 
   //Esta fun��o  usada para converter caracteres em string
    $extensao1 = strtolower(substr($_FILES['fotocapa']['name'], -4));
    //faz md5 para nao ter nomes repetidos nas fotos
    $novo_nome1 = md5(time()).$extensao1;
    //mover arquivo da foto1 para a pasta FOTOS no computador
    move_uploaded_file($_FILES['fotocapa']['tmp_name'], $diretorio.$novo_nome1);
  
  //gravar no banco as informacoes
  $sql = "INSERT INTO livro (codigo,titulo,codcategoria,codclassificacao,ano,edicao,codautor,editora,paginas,fotocapa,valor)
          VALUES ('$codigo','$titulo','$codcategoria','$codclassificacao'
          ,'$ano','$edicao','$codautor','$editora','$paginas',
          '$novo_nome1','$valor')";

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
   $codigo    = $_POST['codigo'];
   $titulo = $_POST['titulo'];
   $codigo     = $_POST['codcategoria'];
   $codclassificacao     = $_POST['codclassificacao   '];
   $ano = $_POST['ano'];
   $edicao = $_POST['edicao'];
   $codautor        = $_POST['codautor'];
   $editora    = $_POST['editora'];
   $paginas      = $_POST['paginas'];
   $fotocapa = $_FILES['fotocapa'];
   $valor = $_FILES['valor'];
  
  $sql = "DELETE FROM livro WHERE codigo = '$codigo'";
          
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
   $codigo    = $_POST['codigo'];
   $titulo = $_POST['titulo'];
   $codigo     = $_POST['codcategoria'];
   $codclassificacao     = $_POST['codclassificacao   '];
   $ano = $_POST['ano'];
   $edicao = $_POST['edicao'];
   $codautor        = $_POST['codautor'];
   $editora    = $_POST['editora'];
   $paginas      = $_POST['paginas'];
   $fotocapa = $_FILES['fotocapa'];
   $valor = $_FILES['valor'];
   //criar pasta computador
   $diretorio = "fotos/";

   //Esta fun��o  usada para converter caracteres em string
   $extensao1 = strtolower(substr($_FILES['fotocapa']['name'], -2));
   //faz md5 para nao ter nomes repetidos nas fotos
   $novo_nome1 = md5(time()).$extensao1;
   //mover arquivo da foto1 para a pasta FOTOS no computador
   move_uploaded_file($_FILES['fotocapa']['tmp_name'], $diretorio.$novo_nome1);
   
   $sql = "UPDATE livro SET codigo='$codigo','$titulo','$codcategoria','$codclassificacao'
                                    ,'$ano','$edicao','$codautor','$editora','$paginas',
                                    '$novo_nome1','$valor'WHERE codigo = '$codigo'";


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
   $sql = mysql_query('$codigo','$titulo','$codcategoria','$codclassificacao'
                     ,'$ano','$edicao','$codautor','$editora','$paginas',
                     '$novo_nome1','$valor');

   echo "<b>Usuarios Cadastrados:</b><br><br>";
   while ($dados = mysql_fetch_object($sql))
	{
      echo "codigo     :".$dados->codigo."  ";
      echo "titulo  :".$dados->descricao." ";
      echo "codcategoria :".$dados->codcategoria." ";
      echo "codclassificacao :       ".$dados->codclassificacao." ";
      echo "ano  :".$dados->ano." ";
      echo "edicao :".$dados->edicao." ";
      echo "codautor :       ".$dados->codautor." ";
      echo "editora     :".$dados->editora."  ";
      echo "paginas :".$dados->paginas." ";
      echo "valor     :".$dados->valor."  ";
      echo '<img src="fotos/'.$dados->fotocapa.'" height="100" width="150" />'."<br><br>";
	}
}
?>
