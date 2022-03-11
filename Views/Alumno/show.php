<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php foreach ($listaAlumnos as$alumno) {?>		
    <tr>
        <td> <a href="?controller=alumno&&action=updateshow&&idAlumno=<?php  echo $alumno->getId()?>"> <?php echo $alumno->getId(); ?></a> </td>
        <td><?php echo $alumno->getEmail(); ?></td>
        <td><?php echo $alumno->getContraseña(); ?></td>
        <td><?php if ( $alumno->getEstado()=='checked'):?>
            Activo
        <?php  else:?>
            Inactivo
        <?php endif; ?></td>
        <td><a href="?controller=alumno&&action=delete&&id=<?php echo $alumno->getId() ?>">Eliminar</a> </td>
    </tr>
    <?php } ?>
    </tr>
  </tbody>
</table>