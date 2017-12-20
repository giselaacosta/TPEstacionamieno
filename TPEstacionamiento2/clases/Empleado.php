<?php
class Empleado
{
	public $id;
 	public $nombre;
	public $apellido;
	public $clave;
  	public $mail;
	public $turno;
	public $perfil;
	public $fechacreacion;
	public $foto;

	public function GetMail()
	{
		return $this->mail;
	}
	public function GetClave()
	{
		return $this->clave;
	}
	
	public function SetMail($valor)
	{
		$this->mail = $valor;
	}
	public function SetClave($valor)
	{
		$this->clave = $valor;
	}
	
	public function GetPerfil()
	{
		return $this->perfil;
	}
	
	public function SetPerfil($valor)
	{
		$this->perfil = $valor;
	}
  	public function BorrarEmpleado()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from empleados 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }


	public function ModificarEmpleado()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update empleados 
				set nombre='$this->nombre',
				apellido='$this->apellido',
				clave='$this->clave',
				mail='$this->mail',
				turno='$this->turno',
				perfil='$this->perfil',
				fechacreacion='$this->fechacreacion',
				foto='$this->foto'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }

  
	 public function InsertarEmpleado()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `empleados`( `nombre`, `apellido`, `clave`, `mail`, `turno`, `perfil`, `fechacreacion`,`foto`) VALUES ('$this->nombre','$this->apellido','$this->clave','$this->mail','$this->turno','$this->perfil','$this->fechacreacion','$this->foto')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

	 }





	 public function InsertarElEmpleadoParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into empleados (nombre,apellido,clave,mail,turno,perfil,fechacreacion,foto)values('$this->nombre','$this->apellido','$this->clave','$this->mail','$this->turno','$this->perfil','$this->fechacreacion','$this->foto')");
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
				$consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
				$consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
				$consulta->bindValue(':turno', $this->turno, PDO::PARAM_STR);
				$consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
				$consulta->bindValue(':fechacreacion', $this->fechacreacion, PDO::PARAM_STR);
				
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }


	 public function ModificarEmpleadoParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update empleados 
				set nombre=:nombre,
				apellido=:apellido,
				clave=:clave,
				mail=:mail,
				turno=:turno,
				perfil=:perfil,
				fechacreacion=:fechacreacion,
				foto=:foto
				WHERE id=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
			$consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
			$consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
			$consulta->bindValue(':turno', $this->turno, PDO::PARAM_STR);
			$consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
			$consulta->bindValue(':fechacreacion', $this->fechacreacion, PDO::PARAM_STR);
		    $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
			return $consulta->execute();
	 }
	 public function GuardarEmpleado()
	 {

	 	if($this->id>0)
	 		{
	 			$this->ModificarEmpleadoParametros();
	 		}else {
	 			$this->InsertarElEmpleadoParametros();
	 		}

	 }


  	public static function TraerTodoLosEmpleados()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, apellido as apellido,clave as clave,mail as mail,turno as turno,perfil as perfil,fechacreacion as fechacreacion,foto as foto  from empleados");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Empleado");		
	}

	public static function TraerUnEmpleado($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, apellido as apellido,clave as clave,mail as mail,turno as turno,perfil as perfil,fechacreacion as fechacreacion,foto as foto from empleados where id = $id");
			$consulta->execute();
			$empleadoBuscado= $consulta->fetchObject('Empleado');
			return $empleadoBuscado;				

			
	}

	public static function TraerTodoLosEmpleadosPorBusqueda($palabra)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, apellido as apellido,clave as clave,mail as mail,turno as turno,perfil as perfil,fechacreacion as fechacreacion,foto as foto from empleados  WHERE apellido like  '%$palabra%' ");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Empleado");		
	}
   


	public function mostrarDatos()
	{
	  	return "Metodo mostrar:".$this->nombre."  ".$this->apellido."  ".$this->clave."  ".$this->mail."  ".$this->turno."  ".$this->perfil."  ".$this->fechacreacion."  ".$this->foto;
	}

}