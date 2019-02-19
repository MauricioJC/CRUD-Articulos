<?php $this->load->view('layouts/header');?>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">Crear nuevo Artículo</h1>
            <hr>
            <?php echo form_open('ArticulosController/store'); ?>
                    <div class="form-group">
                        <label for="clave">Clave</label>
                        <input type="text" class="form-control" name="clave" value="<?php echo set_value('clave'); ?>" > 
                        <?php echo form_error('clave', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo set_value('nombre'); ?>">
                        <?php echo form_error('nombre', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="existencias">Existencias</label>
                        <input type="number" class="form-control" name="existencias" value="<?php echo set_value('existencias'); ?>">
                        <?php echo form_error('existencias', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Crear</button>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer');?>