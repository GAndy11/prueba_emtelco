<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Listado de Personas</h1>
        </div>
    </div>
    <br>
    <br>
    <a href="?controller=personas&action=CrearPersona">
        <button class="btn btn-primary">Crear Nuevo</button>
    </a>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha Nacimiento</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($personas){ ?>
                        <?php while($persona = $personas->fetch_object()): ?>
                            <tr>
                                <th scope="row"><?=$persona->id;?></th>
                                <td><?=$persona->DNI;?></td>
                                <td><?=$persona->nombre;?></td>
                                <td><?=$persona->fecha_nacimiento;?></td>
                                <td><?=$persona->direccion;?></td>
                                <td><?=$persona->telefono;?></td>
                                <td><a href="?controller=personas&action=EditarPersona&id=<?=$persona->id;?>">Editar</a> </td>
                                <td><a href="?controller=personas&action=BorrarPersona&id=<?=$persona->id;?>">Borrar</a> </td>
                            </tr>
                        <?php endwhile; ?>

                        <?php if($mensaje != "") { ?> 
                            <div class="alert alert-primary alert-dismissible fade show box-mensaje" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <?= $mensaje;?>
                        <?php } ?>
                        
                    </div>
                    <?php } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>