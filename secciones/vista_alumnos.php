<?php include('../template/cabecera.php') ?>
<?php include('../secciones/alumnos.php') ?>

<br>

<div class="row">
    <div class="col-5">
        <form action="" method="post">
            <div class="card">
                <div class="card-header">
                    Alumnos
                </div>
                <div class="card-body">
                    <div class="mb-3">
                      <label for="id" class="form-label">ID</label>
                      <input type="text" value="<?php echo $id ?>"
                        class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="id">
                    </div>
                    <div class="mb-3">
                      <label for="nombre" class="form-label">Nombre</label>
                      <input type="text" value="<?php echo $nombre ?>"
                        class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Escriba el nombre">
                    </div>
                    <div class="mb-3">
                      <label for="apellidos" class="form-label">Apellidos</label>
                      <input type="text" value="<?php echo $apellidos ?>"
                        class="form-control" name="apellidos" id="apellidos" aria-describedby="helpId" placeholder="Escriba los Apellidos">
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Cuso del Alumno</label>
                      <select multiple class="form-control" name="cursos[]" id="listaCursos">
                        
                        <?php foreach($cursos as $curso){ ?>
                        <option
                            <?php 
                                if(!empty($arregloCursos)):
                                    if(in_array($curso['id'],$arregloCursos)):
                                        echo 'selected';
                                    endif;
                                endif;
                            ?>
                            value="<?php echo $curso['id']; ?>"><?php echo $curso['id']; ?> - <?php echo $curso['nombre_curso']; ?>
                        </option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="btn-group" role="group" aria-label="">
                        <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
                        <button type="submit" name="accion" value="editar" class="btn btn-warning">Editar</button>
                        <button type="submit" name="accion" value="borrar" class="btn btn-danger">Borrar</button>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    Footer
                </div>
            </div>
        </form>
    </div>
    <div class="col-7">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Cursos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listaAlumnos as $alumno): ?>
                <tr>
                    <td scope="row"><?php echo $alumno['id'] ?></td>
                    <td><?php echo $alumno['nombre'] ?></td>
                    <td><?php echo $alumno['apellidos'] ?></td>
                    <td><?php foreach($alumno["cursos"] as $curso){
                        echo "-";?>
                        <a target="_blank" href="certificado.php?idcurso=<?php echo $curso['id']?>&idalumno=<?php echo $alumno['id']?>"><i class="bi bi-filetype-pdf text-danger"></i><?php echo $curso['nombre_curso'];?></a>
                    <br>
                    <?php
                    } ?></td>
                    <td> 
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $alumno['id'] ?>">
                            <input type="submit" value="seleccionar" name="accion" class="btn btn-info">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
</div>

<!--Libreria de Selccion Multiple-->
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.3/dist/js/tom-select.complete.min.js"></script>

<script>
    new TomSelect('#listaCursos');
</script>
<?php include('../template/pie.php') ?>