<?php include('../template/cabecera.php') ?>
<?php include('../secciones/cursos.php') ?>

<br>

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-md-5">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            Cursos
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="id" class="form-label">ID</label>
                                <input value="<?php echo $id ?>" type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="ID">
                            </div>
                            <div class="mb-3">
                                <label for="nombre_curso" class="form-label">Nombre</label>
                                <input value="<?php echo $nombre_curso ?>" type="text" class="form-control" name="nombre_curso" id="nombre_curso" aria-describedby="helpId" placeholder="Nombre del curso">
                            </div>
                            <div class="btn-group" role="group" aria-label="">
                                <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
                                <button type="submit" name="accion" value="editar" class="btn btn-warning">Editar</button>
                                <button type="submit" name="accion"value="borrar" class="btn btn-danger">Borrar</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-md-7">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listaCursos as $curso){ ?>
                        <tr>
                            <td scope="row"><?php echo $curso['id'] ?></td>
                            <td><?php echo $curso['nombre_curso'] ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $curso['id'] ?>">
                                    <input type="submit" value="seleccionar" name="accion" class="btn btn-info">
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php include('../template/pie.php') ?>