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

            <?php echo form_open_multipart('user/cadastrar');?>
			<?php echo form_open($acao); ?>

            <div class="form-group">
                <label for="full_name">Nome Completo</label>
                <input id="full_name" class="form-control" type="text" name="full_name"
                value="<?= set_value('full_name', $registro['full_name']); ?>" 
                placeholder="Nome Completo" >
            </div>

            <div class="form-group">
                <label for="income">Renda Mensal</label>
                <input id="income" class="form-control" type="text" name="income"
                value="<?= set_value('income', $registro['income']); ?>"
                placeholder="Renda Mensal" >
            </div>

            <div class="form-group">
                <label for="image">Foto</label>
                <input id="image" class="form-control" type="file" name="image" >
            </div>

            <div class="form-group">
                <label for="user_u">Usuário</label>
                <input id="user_u" class="form-control" type="text" name="user_u"
                value="<?= set_value('user_u', $registro['user_u']); ?>"
                placeholder="Usuário" >
            </div>

            <?php if(!isset($registro)){?>
                <div class="form-group">
                    <label for="pass">Senha</label>
                    <input id="pass" class="form-control" type="password" name="pass"
                    value="<?= set_value('pass', $registro['pass']); ?>"
                    placeholder="Senha" >
                </div>
            <?php }?>

            <button class="btn btn-success" type="submit"><i class="fa fa-send"></i> Enviar</button>
            <button class="btn btn-warning" onclick="JavaScript: window.history.back();"><i class="fa fa-remove"></i> Cancelar</button>
          </form>
        </div>
    </div>
</div>