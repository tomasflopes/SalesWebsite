<?php
include '../../include/control.inc.php';
include '../../include/config.inc.php';
include $dir_site . '/include/functions.inc.php';
include $dir_site . '/include/db.inc.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

if ($_FILES['foto']['name'] != '') {
  $foto = $_FILES['foto'];
  $nome_imagem = $foto['name'];
  $ficheiro = $dir_site . '/img/' . $nome_imagem;

  copy($foto['tmp_name'], $ficheiro);
} else {
  $comando = 'select foto from produtos where id=' . $id . ';';
  $resultado = my_query($comando);
  $nome_imagem = $resultado[0]['foto'];
}

echo $query = 'UPDATE produtos SET nome = "' . $nome . '", preco = "' . $preco . '", foto = "' . $nome_imagem . '", descricao = "' . $descricao . '" WHERE id = ' . $id . ';';
my_query($query);

header('Location: index.php');
