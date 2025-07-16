<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Inscrição Campeonato IFPI</title>
</head>
<body>
  <h1>Inscrição - Campeonato de Futsal do IFPI</h1>
  <form action="enviar.php" method="POST">
    <label>Nome da Equipe:</label><br>
    <input type="text" name="equipe" required><br><br>

    <label>Responsável:</label><br>
    <input type="text" name="responsavel"><br><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone"><br><br>

    <label>Instituição/Bairro:</label><br>
    <input type="text" name="bairro"><br><br>

    <label>Jogadores (10 nomes):</label><br>
    <?php for ($i = 1; $i <= 10; $i++): ?>
      <input type="text" name="jogador<?= $i ?>" placeholder="Jogador <?= $i ?>"><br>
    <?php endfor; ?>

    <br>
    <button type="submit">Enviar Inscrição</button>
  </form>
</body>
</html>
