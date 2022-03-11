<?php
    require_once("Views/Layouts/layout.php")
?>

<form action="?controller=alumno&action=update" method="POST">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuario ID: <?php echo $id = $alumno->getId(); ?></label>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="<?php echo $email = $alumno->getEmail(); ?>" value = "<?php echo $email; ?>" >
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="contraseña" placeholder="•••••••••••">
  </div>
  
 
  <div class="check-box">
			<label>Activo <input type="checkbox" name="estado" <?php echo $alumno->getEstado() ?>></label>
		</div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>