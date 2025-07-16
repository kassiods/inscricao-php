<?php
include('config.php');

$options = [
  'http' => [
    'header'  => [
      "apikey: " . SUPABASE_API_KEY,
      "Authorization: Bearer " . SUPABASE_API_KEY
    ],
    'method'  => 'GET'
  ]
];
$context = stream_context_create($options);
$data = file_get_contents(SUPABASE_URL . "/rest/v1/inscricoes_futsal?select=*", false, $context);
$inscricoes = json_decode($data, true);
?>

<h1>Inscrições Recebidas</h1>
<table border="1" cellpadding="10">
  <tr>
    <th>Equipe</th>
    <th>Responsável</th>
    <th>Telefone</th>
    <th>Bairro</th>
    <th>Jogadores</th>
    <th>Data</th>
  </tr>
  <?php foreach ($inscricoes as $i): ?>
    <tr>
      <td><?= $i['nome_equipe'] ?></td>
      <td><?= $i['responsavel'] ?></td>
      <td><?= $i['telefone'] ?></td>
      <td><?= $i['bairro'] ?></td>
      <td>
        <ul>
        <?php foreach (json_decode($i['jogadores']) as $jogador): ?>
          <li><?= htmlspecialchars($jogador) ?></li>
        <?php endforeach; ?>
        </ul>
      </td>
      <td><?= date('d/m/Y H:i', strtotime($i['data_inscricao'])) ?></td>
    </tr>
  <?php endforeach; ?>
</table>
