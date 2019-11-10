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

			<?php echo form_open($acao); ?>
					
            <div class="form-group">
                <label for="salary">Salário</label>
                <input id="salary" class="form-control" type="salary" name="salary"
                value="<?= set_value('salary', $registro['salary']); ?>"
                placeholder="Informe seu salário" required>
            </div>

            <div class="form-group">
                <label for="user">Usuário</label>
                <select class="form-control" name="user">
                <option value="">Selecione o usuário</option>
                <?php foreach ($listaUser as $lu): ?>
                  <option value="<?= $lu['id_user'] ?>" <?php if(isset($registro) && $lu['id_user']==$registro['user']) echo "selected"; ?> ><?= $lu["full_name"]; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <button class="btn btn-success" type="submit" formtarget="_blank"><i class="fa fa-send"></i> Enviar</button>
            <button class="btn btn-warning" onclick="JavaScript: window.history.back();"><i class="fa fa-remove"></i> Cancelar</button>
          </form>
        </div>
    </div>
</div>
