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
                <label for="outgoing">Gasto</label>
                <input id="outgoing" class="form-control" type="text" name="outgoing"
                value="<?= set_value('outgoing', $registro['outgoing']); ?>" 
                placeholder="Informe o Gasto" required>
            </div>

            <div class="form-group">
                <label for="outdate">Data do Gasto</label>
                <input id="outdate" class="form-control" type="date" name="outdate"
                value="<?= set_value('outdate', $registro['outdate']); ?>"
                placeholder="Data do gasto" required>
            </div>

            <div class="form-group">
                <label for="rating">Valor</label>
                <input id="rating" class="form-control" type="text" name="rating"
                value="<?= set_value('rating', $registro['rating']); ?>"
                placeholder="Informe o valor gasto" required>
            </div>

            <div class="form-group">
                <label for="place">Local</label>
                <select class="form-control" name="place">
                <option value="">Selecione o local onde gastou</option>
                <?php foreach ($listaPlace as $l): ?>
                  <option value="<?= $l['id_place'] ?>" <?php if(isset($registro) && $l['id_place']==$registro['place']) echo "selected"; ?> ><?= $l["place"]; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
                <label for="user">Usuário</label>
                <select class="form-control" name="user">
                <option value="">Selecione o usuário que realizou a compra</option>
                <?php foreach ($listaUser as $lu): ?>
                  <option value="<?= $lu['id_user'] ?>" <?php if(isset($registro) && $lu['id_user']==$registro['user']) echo "selected"; ?> ><?= $lu["full_name"]; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <button class="btn btn-success" type="submit"><i class="fa fa-send"></i> Enviar</button>
            <button class="btn btn-warning" onclick="JavaScript: window.history.back();"><i class="fa fa-remove"></i> Cancelar</button>
          </form>
        </div>
    </div>
</div>
