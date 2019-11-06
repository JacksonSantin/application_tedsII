<div class="row col-md-12">
    <div class="box">
        <div class="box-body">
          <?php
              //verificando se o form_validation retornou erros
              if(validation_errors() != null){ ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                    <?php echo validation_errors(); //mostra os erros?>
                </div>
          <?php } ?>

          <?php echo form_open('reports/gastoPeriodo'); ?>
            <div class="form-group">
              <label for="idestado">Data Inicial</label>
              <input class="form-control" type="date" name="data_inicial" value="<?= date('Y-m-01'); ?>">
            </div>
            <div class="form-group">
              <label for="idestado">Data Final</label>
              <input class="form-control" type="date" name="data_final" value="<?= date('Y-m-d'); ?>">
            </div>
            <button class="btn btn-success" type="submit" formtarget="_blank">Enviar</button>
          </form>
        </div>
    </div>
</div>
