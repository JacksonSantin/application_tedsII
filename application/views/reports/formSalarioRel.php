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
                
                <?php 
                  echo form_open('reports/salario');
                  $result = 0;
                ?>
            <div class="form-group">
              <label for="idsalario">Salário Inicial</label>
              <input class="form-control" type="text" name="salario_inicial" value="<?= set_value('salary', $result['salary']); ?>">
            </div>
            <div class="form-group">
              <label for="idsalario">Salário Final</label>
              <input class="form-control" type="text" name="salario_final" value="<?= set_value('salary', $result['salary']); ?>">
            </div>
            <button class="btn btn-success" type="submit" formtarget="_blank"><i class="fa fa-send"></i> Enviar</button>
            <button class="btn btn-warning" onclick="JavaScript: window.history.back();"><i class="fa fa-remove"></i> Cancelar</button>
          </form>
        </div>
    </div>
</div>
