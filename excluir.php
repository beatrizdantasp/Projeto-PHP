<?php
$nome = $_GET['nome'] ?? '';
$contatos = json_decode(file_get_contents('contatos.json'), true);
$contatos = array_filter($contatos, fn($c) => $c['nome'] !== $nome);
file_put_contents('contatos.json', json_encode(array_values($contatos), JSON_PRETTY_PRINT));
header('Location: index.php');
exit;
?>
