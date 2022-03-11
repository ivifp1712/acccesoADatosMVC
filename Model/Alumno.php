<?php
class Alumno{
    private $id;
    private $email;
    private $contraseña;
    private $estado;

    function __construct($id, $email, $contraseña, $estado){
        $this->id = $id;
        $this->email = $email;
        $this->contraseña = $contraseña;
        $this->setEstado($estado);
    }
    
	


    public static function all(){
        // require_once("connection.php");
		$db=Db::getConnection();
		$listaAlumnos=[];

		$select=$db->query('SELECT * FROM alumno order by id');

		foreach($select->fetchAll() as $alumno){
			$listaAlumnos[]=new Alumno($alumno['id'],$alumno['email'],$alumno['pass'],$alumno['estado']);
		}
		return $listaAlumnos;
	}   


    
    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado){
		
		if (strcmp($estado, 'on')==0) {
			$this->estado=1;
		} elseif(strcmp($estado, '1')==0) {
			$this->estado='checked';
		}elseif (strcmp($estado, '0')==0) {
			$this->estado='of';
		}else {
			$this->estado=0;
		}
 
	}

    public function getEmail()
    {
        return $this->email;
    }

    
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    
    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
     
    public function getContraseña()
    {
        return $this->contraseña;
    }

    
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;
        return $this;
    }

    static function searchById($id)
    {
        $db=Db::getConnection();
		$select=$db->prepare('SELECT * FROM alumno WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$alumnoDb=$select->fetch();


		$alumno = new Alumno ($alumnoDb['id'],$alumnoDb['email'], $alumnoDb['pass'], $alumnoDb['estado']);
		//var_dump($alumno);
		//die();
		return $alumno;
    }
    static function buscarById($id)
    {
        $db=Db::getConnection();
		$select=$db->prepare('SELECT * FROM alumno WHERE id=:id');
		$select->bindValue('id',$id);
		$select->execute();

		$alumnoDb=$select->fetch();
        if (isset($alumnoDb['email'])){
            $alumno = new Alumno ($alumnoDb['id'],$alumnoDb['email'], $alumnoDb['pass'], $alumnoDb['estado']);
            return $alumno;
        }else{
            return 0;
        }
		
		//var_dump($alumno);
		//die();
		
    }
    static function update($alumno){
        $db=Db::getConnection();
        echo $alumno->getId()."<br>";
		$update=$db->prepare('UPDATE alumno SET email=:email, pass=:pass, estado=:estado WHERE id=:id');
		$update->bindValue('email', $alumno->getEmail());
		$update->bindValue('pass', password_hash($alumno->getContraseña() , PASSWORD_DEFAULT, ['cost' => 4]));
		$update->bindValue('estado',$alumno->getEstado());
		$update->bindValue('id',$alumno->getId());
		$update->execute();
    }
    public static function save($alumno){
		$db=Db::getConnection();
		//var_dump($alumno);
		//die();
		$insert=$db->prepare('INSERT INTO alumno VALUES (NULL, :email,:pass,:estado)');
		$insert->bindValue('email',$alumno->getEmail());
		$insert->bindValue('pass',password_hash($alumno->getContraseña() , PASSWORD_DEFAULT, ['cost' => 4]));
		$insert->bindValue('estado',$alumno->getEstado());
		$insert->execute();
	}

    public static function delete($id){
		$db=Db::getConnection();
		$delete=$db->prepare('DELETE  FROM alumno WHERE id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();		
	}
}
    