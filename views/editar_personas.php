<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>Editar Persona</h1>
        </div>
    </div>
    <br>
    <div class="mensaje-box">
        <?= $mensaje;?>
    </div>
    <br>
    <?php if($persona->getNombre()){  ?>
        <div class="row">
            <div class="col-md-12">
                <form action="?controller=personas&action=ActualizarPersona&id=<?= $_GET['id'];?>" method="POST">
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese el DNI" value="<?= $persona->getDNI();?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" value="<?= $persona->getNombre();?>" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Ingrese la fecha de nacimiento" value="<?= $persona->getFechaNacimiento();?>" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección" value="<?= $persona->getDireccion();?>" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el teléfono" value="<?= $persona->getTelefono();?>" required>
                    </div>
                    <input id="id" name="id" type="hidden" value="<?= $_GET['id'];?>">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
                <br>
                <a href="?controller=personas&action=index">ir Atrás</a>
            </div>
        </div>

    <?php } ?>
</div>