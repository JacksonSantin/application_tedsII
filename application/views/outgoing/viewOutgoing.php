<link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<div class="row">
    <div class="col-md-12">
      <a class="btn btn-primary" href="<?= site_url('outgoing/cadastrar'); ?>">
        <i class="fa fa-fw fa-plus"></i>Adicionar
      </a>
      <a class="btn btn-success" target="_blank" href="<?= site_url('reports/formGastoPeriodo'); ?>">
        <i class="fa fa-bank"></i>Relatório
      </a>
        <div class="box">
          <div class="box-body">
            <table id="tabelaDataTable" class="table table-hover table-striped">
              <thead>
                <th>#</th>
                <th>Gasto</th>
                <th>Data do Gasto</th>
                <th>Valor Gasto</th>
                <th>Local</th>
                <th>Usuário</th>
                <th class="col-md-1">Ações</th>
              </thead>
              <tbody>
                <?php foreach($lista as $item):?>
                  <tr>
                    <td><?= $item['id_outgoin'];?></td>
                    <td><?= $item['outgoing'];?></td>
                    <td><?= $item['outdate'];?></td>
                    <td><?= $item['rating'];?></td>
                    <td><?= $item['place'];?></td>
                    <td><?= $item['user_cad'];?></td>
                    <td>
                        <a class="btn btn-xs btn-info" href="<?= site_url('outgoing/cadastrar/'.$item['id_outgoin']); ?>">
                            <i class="fa fa-fw fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-danger confirmaExclusao" data-id="<?= $item['id_outgoin'];?>" data-nome="<?= $item['outgoing'];?>">
                            <i class="fa fa-fw fa-trash"></i>
                        </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>


<!-- DataTables -->
<script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); ?>"></script>

<script type="text/javascript">
$(document).ready( function () {
  $('#tabelaDataTable').DataTable( {
      "language": { "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json" }
    });
} );
</script>

<script type="text/javascript">
  $('.confirmaExclusao').on('click', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    var nome = $(this).data('outgoing');

    console.log('id: ' + id,'outgoing: ' + nome);
    
    $('#nomeItem').text(id);
    // criando uma variável id no modal para receber o id do item a ser excluído.
    $('#modalConfirmacao').data('id', id);
    $('#modalConfirmacao').modal('show');
  });

  function remove(){
    var id = $('#modalConfirmacao').data('id');
    document.location.href = "<?= site_url('outgoing/remover/') ?>" + id;
  }
</script>

<!-- MODAL DE CONFIRMAÇÃO DE EXCLUSÃO -->
<div class="modal fade" id="modalConfirmacao">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Atenção</h4>
        </div>
        <div class="modal-body">
          <p>Você tem certeza que deseja excluir o item <span id="nomeItem"></span> ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
          <button type="button" onclick="remove();" class="btn btn-danger">Sim, remover</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
