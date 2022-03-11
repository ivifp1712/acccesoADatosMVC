<?php

class AlumnoController{
    function index(){
		require_once('Views/Alumno/bienvenido.php');
	}
 
	function register(){
		require_once('Views/Alumno/register.php');
	}
    function error()
    {
        
    }
    function show()
    {
        $listaAlumnos=Alumno::all();
        require_once('Views/Alumno/show.php');
    }
    function updateshow(){
        $id=$_GET['idAlumno'];
		$alumno=Alumno::searchById($id);
		require_once('Views/Alumno/updateshow.php');
    }
    function update(){
        $alumno = new Alumno($_POST['id'],$_POST['email'],$_POST['contraseña'],$_POST['estado']);
		Alumno::update($alumno);
		$this->show();
    }
    function save(){
		if (!isset($_POST['estado'])) {
			$estado="of";
		}else{
			$estado="on";
		}
		$alumno= new Alumno(null, $_POST['email'],$_POST['contraseña'],$estado);

		Alumno::save($alumno);
		$this->show();
	}
    function delete(){
        $id=$_GET['id'];
		Alumno::delete($id);
		$this->show();
    }
    function search()
    {
        $id=$_GET['id'];
        //echo $id;
		$alumno=Alumno::buscarById($id);
        if ($alumno != 0) {
            require_once('Views/Alumno/updateshow.php');
        }else{
            echo ("<h1> Esa ID no existe en la base de datos.</h1>");
        }
		
    }
}// cierra clase