<?php $this->load->view('layouts/header');?>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">Editar Artículo</h1>
            <hr>
            <?php echo form_open("ArticulosController/update/$articulo->id"); ?>
                    <div class="form-group">
                        <label>Id</label>
                        <input type="text" class="form-control" value="<?php echo $articulo->id; ?>" disabled>
                        <input type="text" class="form-control" name="id" value="<?php echo $articulo->id; ?>" hidden>
                    </div>
                    <div class="form-group">
                        <label for="clave">Clave</label>
                        <input type="text" class="form-control" value="<?php echo $articulo->clave; ?>" name="clave">
                        <?php echo form_error('clave', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" value="<?php echo $articulo->nombre; ?>" name="nombre">
                        <?php echo form_error('nombre', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="existencias">Existencias</label>
                        <input type="number" class="form-control" value="<?php echo $articulo->existencias; ?>" name="existencias">
                        <?php echo form_error('existencias', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Guardar cambios</button>
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer');?>