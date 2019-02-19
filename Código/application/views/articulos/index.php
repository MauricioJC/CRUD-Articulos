<?php $this->load->view('layouts/header');?>
<div class="container mt-3">
    <div class="row justify-content-center">
        <h1>Lista de Articulos
         <a href="<?php echo site_url('ArticulosController/create');?>" 
            class="btn btn-sm btn-primary">Crear nuevo</a></h1>
        <div class="col-md-8">
            <?php if($this->session->flashdata('message')){?>
                <div class="alert alert-success" role="alert">      
                    <?php echo $this->session->flashdata('message')?>
                </div>
            <?php } ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Calve</th>
                        <th>Nombre</th>
                        <th>Existencias</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($articulos as $articulo) {?>
                        <tr>
                            <th scope="row"><?php echo $articulo->id; ?></th>
                            <td><?php echo $articulo->clave; ?></td>
                            <td><?php echo $articulo->nombre; ?></td>
                            <td><?php echo $articulo->existencias; ?></td>
                            <td>
                                <a href="<?php echo site_url('ArticulosController/edit');?>/<?php echo $articulo->id;?>" class="btn btn-sm btn-secondary" >Editar</a> 
                                <a href="<?php echo site_url('ArticulosController/delete');?>/<?php echo $articulo->id;?>" class="btn btn-sm btn-danger" >Eliminar</a> 
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer');?>