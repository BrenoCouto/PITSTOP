<?php include 'inc/header_adm.php'; ?>

<h2>Estacionamento</h2>

    <<div class="row">
        <div class="panel panel-primary filterable" >
            <div class="panel-heading" style="background-color: #ffff00" >
                <h3 class="panel-title" style="color: #000000">Provedor</h3>
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filtrar</button>
                    <a class="btn btn-default btn-xs btn-filter" href='?classe=Cliente&acao=create'>Novo</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control-visualizar" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control-visualizar" placeholder="Nome do Provedor" disabled></th>
                        <th><input type="text" class="form-control-visualizar" placeholder="CNPJ" disabled></th>

                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($provedores as $provedor){?>
                    <tr>
                        <td><?=$provedor->idProvedor?></td>
                        <td><?=$provedor->Nome?></td>
                        <td><?=$provedor->CNPJ?></td>

                        <td><a class='btn btn-primary' href='?classe=Provedor&acao=read&id=<?=$provedor->idProvedor?>'>Ver</a></td>
                        <td><a class='btn btn-warning' href='?classe=Provedor&acao=update&id=<?=$provedor->idProvedor?>'>Alterar</a></td>
                        <td><a class='btn btn-danger' href='?classe=Arquivo&acao=delete&id=<?=$provedor->idProvedor?>'>Excluir</a></td>
                    </tr>

                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

<?php include 'inc/footer.php'; ?>


<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Excluir</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Tem certeza que deseja excluir o registro?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <a id="btnExcluir" class='btn btn-primary' href=''>Sim</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
            </div>

        </div>
    </div>
</div>


<script>
    $('#myModal').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $("#btnExcluir").attr('href','?classe=Disciplina&acao=delete&id='+id);
    });


    $(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});
</script>

