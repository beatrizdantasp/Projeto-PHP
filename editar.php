<?php
$contatos = json_decode(file_get_contents('contatos.json'), true);
$nomeAntigo = $_GET['nome'] ?? '';
$contato = null;
foreach ($contatos as $c) {
    if ($c['nome'] === $nomeAntigo) {
        $contato = $c;
        break;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($contatos as &$c) {
        if ($c['nome'] === $nomeAntigo) {
            $c['nome'] = $_POST['nome'];
            $c['telefone'] = $_POST['telefone'];
            $c['email'] = $_POST['email'];
        }
    }
    file_put_contents('contatos.json', json_encode($contatos, JSON_PRETTY_PRINT));
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Contato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Editar Contato</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $contato['nome']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?php echo $contato['telefone']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $contato['email']; ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-warning text-white">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>
