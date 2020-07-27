<?php 
require_once('../../controllers/AtendimentoController.php');
$atendimentos = AtendimentoController::selectAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//gaintime.github.io/cdn/3.0.0/css/gaintime.min.css" media="screen" title="no title">
    <script type="text/javascript" src="//gaintime.github.io/cdn/3.0.0/js/gaintime.min.js"></script>
    <title>Atendimento</title>
</head>

<body>
    <section>
        <div style="display: flex; justify-content: space-between;">

            <h1>Atendimentos</h1>
            <div style="margin-top: 20px;">
                <a href="./create.php" class="action success" title="Novo atendimento"> <span>Novo atendimento</span></a>
            </div>

        </div>
        <table class="gt-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data da Execução</th>
                    <th>Cliente</th>
                    <th>Observação</th>
                    <th>Técnico</th>
                    <th>Tipo de atendimento</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <?php foreach($atendimentos as $atendimento): ?>
                    <td><?= $atendimento->id_atendimento ?></td>
                    <td><?= $atendimento->data_execucao ?></td>
                    <td><?= $atendimento->cliente ?></td>
                    <td><?= $atendimento->observacao ?></td>
                    <td><?= $atendimento->id_tipo_atendimento ?></td>
                    <td><?= $atendimento->id_tecnicos ?></td>
                    <td>
                        <a href="./update.php" class="action success" > <span>Editar</span></a>
                        <a href="./delete.php" class="action danger" > <span>Apagar</span></a>
                        <a href="./view.php" class="action info" > <span>Detalhes</span></a>
                    </td>
                    
                </tr>
                <?php endforeach ?>

            </tbody>
            
        </table>
        
    </section>
</body>

</html>