<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>Crear Persona</h1>
        </div>
    </div>
    <br>
    <div class="mensaje-box">
        <?= $mensaje;?>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form action="?controller=personas&action=GuardarPersona" method="POST">
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese el DNI">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre">
                </div>
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Ingrese la fecha de nacimiento">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el teléfono">
                </div>
                
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
            <br>
            <a href="?controller=personas&action=index">ir Atrás</a>
        </div>
    </div>
</div>