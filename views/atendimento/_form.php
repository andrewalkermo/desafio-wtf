<form class="gt-form" action="../../controllers/AtendimentoController.php" method="post">
    <label for="name_1">data_execucao</label>
    <input id="name_1" data-validate="text" type="text" name="data_execucao">
    <label for="name_1">cliente</label>
    <input id="name_1" data-validate="text" type="text" name="cliente">
    <label for="name_1">observacao</label>
    <input id="name_1" data-validate="text" type="text" name="observacao">
    <label for="name_1">id_tipo_atendimento</label>
    <input id="name_1" data-validate="text" type="text" name="id_tipo_atendimento">
    <label for="name_1">id_tecnicos</label>
    <input id="name_1" data-validate="text" type="text" name="id_tecnicos">
    
    <footer class="btn-group">
        <button type="submit" name="action" value="<?= $action ?>" class="btn success">Submit</button>
    </footer>
</form>