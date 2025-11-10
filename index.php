<?php
$contatos = json_decode(file_get_contents('contatos.json'), true);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Minha Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Minha Agenda</span>
    <a href="novo.php" class="btn btn-success">+ Novo Contato</a>
  </div>
</nav>

<div class="container">
    <h2 class="mb-3"><i class="bi bi-journal-text"></i> Minha Agenda</h2>
    <input type="text" id="busca" class="form-control mb-4" placeholder="Buscar contato..." onkeyup="filtrarContatos()">

    <?php foreach($contatos as $c): ?>
        <div class="card p-3 mb-3 contato-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="nome mb-1"><?php echo $c['nome']; ?></h5>
                    <p class="mb-0"><i class="bi bi-telephone"></i> <?php echo $c['telefone']; ?></p>
                    <p class="mb-0"><i class="bi bi-envelope"></i> <?php echo $c['email']; ?></p>
                </div>
                <div>
                    <a href="editar.php?nome=<?php echo urlencode($c['nome']); ?>" class="btn btn-warning text-white">Editar</a>
                    <a href="excluir.php?nome=<?php echo urlencode($c['nome']); ?>" class="btn btn-danger" onclick="return confirmarExclusao('<?php echo $c['nome']; ?>')">Excluir</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<footer>© 2025 - Minha Agenda de Contatos</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.js"></script>
<script src="js/script.js"></script>
</body>
</html>
