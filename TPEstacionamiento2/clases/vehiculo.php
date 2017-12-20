<?php
class vehiculo
{
	public $id;
 	public $patente;
 	public $color;
 	public $marca;
	public $fechaingreso;
	public $fechasalida;
	public $importe;
	public $horaingreso;
	public $horasalida;  
	public $tiempotranscurrido; 
    public $cochera; 




  	public function BorrarEstacionado()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from estacionados 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	 public function BorrarFacturado()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from facturados 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	public function ModificarEstacionado()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update estacionados 
				set patente='$this->patente',
				color='$this->color',
				marca='$this->marca',
			    cochera='$this->cochera',
				fechaingreso='$this->fechaingreso',
				fechasalida='$this->fechasalida',
				horaingreso='$this->horaingreso',
				horasalida='$this->horasalida',
				importe='$this->importe'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }


	 public function ModificarFacturado()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update facturados 
				set patente='$this->patente',
				color='$this->color',
				marca='$this->marca',
				cochera='$this->cochera',
				fechaingreso='$this->fechaingreso',
				fechasalida='$this->fechasalida',
				horaingreso='$this->horaingreso',
				horasalida='$this->horasalida',
				tiempotranscurrido='$this->tiempotranscurrido',
				importe='$this->importe'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
  
	 public function InsertarEstacionado()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `estacionados`( `patente`, `fechaingreso`,`horaingreso`,`color`,`marca`,`cochera`) VALUES ('$this->patente','$this->fechaingreso','$this->horaingreso','$this->color','$this->marca','$this->cochera')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

	 }
	 public function InsertarFacturado()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `facturados`( `patente`, `fechaingreso`,`horaingreso`,`fechasalida`, `horasalida`,`tiempotranscurrido`,`importe`,`color`,`marca`,`cochera`) VALUES ('$this->patente','$this->fechaingreso','$this->horaingreso','$this->fechasalida','$this->horasalida','$this->tiempotranscurrido','$this->importe','$this->color','$this->marca','$this->cochera')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

	 }



	 public function InsertarElEstacionadoParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `estacionados`( `patente`, `fechaingreso`, `fechasalida`, `importe`,`horaingreso`,`horasalida`,`color`,`marca`,`cochera`) VALUES ('$this->patente','$this->fechaingreso','$this->fechasalida','$this->importe','$this->horaingreso','$this->horasalida','$this->color','$this->marca','$this->cochera')");
				$consulta->bindValue(':patente',$this->patente, PDO::PARAM_STR);
				$consulta->bindValue(':fechaingreso', $this->fechaingreso, PDO::PARAM_STR);
				$consulta->bindValue(':fechasalida', $this->fechasalida, PDO::PARAM_STR);
				$consulta->bindValue(':importe', $this->importe, PDO::PARAM_STR);
				$consulta->bindValue(':horaingreso', $this->horaingreso, PDO::PARAM_STR);
				$consulta->bindValue(':horasalida', $this->horasalida, PDO::PARAM_STR);
				$consulta->bindValue(':color', $this->color, PDO::PARAM_STR);
				$consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
				$consulta->bindValue(':cochera', $this->marca, PDO::PARAM_STR);
		     $consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }


	 public function ModificarEstacionadoParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
			update estacionados 
			set patente='$this->patente',
			fechaingreso='$this->fechaingreso',
			fechasalida='$this->fechasalida',
			importe='$this->importe'
			horaingreso='$this->horaingreso',
			horasalida='$this->horasalida',
			color='$this->color',
			marca='$this->marca',
			cochera='$this->cochera'
			WHERE id='$this->id'");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':patente',$this->patente, PDO::PARAM_STR);
			$consulta->bindValue(':fechaingreso', $this->fechaingreso, PDO::PARAM_STR);
			$consulta->bindValue(':fechasalida', $this->fechasalida, PDO::PARAM_STR);
			$consulta->bindValue(':importe', $this->importe, PDO::PARAM_STR);
			$consulta->bindValue(':horaingreso', $this->horaingreso, PDO::PARAM_STR);  
			$consulta->bindValue(':horasalida', $this->horasalida, PDO::PARAM_STR);
			$consulta->bindValue(':color', $this->color, PDO::PARAM_STR);
			$consulta->bindValue(':marca', $this->marca, PDO::PARAM_STR);
			$consulta->bindValue(':cochera', $this->cochera, PDO::PARAM_STR);
			return $consulta->execute();
	 }
	 public function GuardarEstacionado()
	 {

	 	if($this->id>0)
	 		{
	 			$this->ModificarEstacionadoParametros();
	 		}else {
	 			$this->InsertarElEstacionadoParametros();
	 		}

	 }


  	public static function TraerTodoLosEstacionados()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,patente as patente, fechaingreso as fechaingreso,horaingreso as horaingreso ,color as color ,marca as marca ,cochera as cochera   from estacionados");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "vehiculo");		
	}


	public static function TraerTodoLosEstacionadosPorBusqueda($palabra)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,patente as patente, fechaingreso as fechaingreso,horaingreso as horaingreso ,color as color ,marca as marca  ,cochera as cochera  from estacionados WHERE patente like  '%$palabra%' ");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "vehiculo");		
	}
	public static function TraerTodoLosFacturados()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,patente as patente, fechaingreso as fechaingreso,fechasalida as fechasalida,importe as importe,horaingreso as horaingreso ,horasalida as horasalida,tiempotranscurrido as tiempotranscurrido ,color as color,marca as marca ,cochera as cochera from facturados");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "vehiculo");		
	}


	public static function TraerUnEstacionado($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,patente as patente, fechaingreso as fechaingreso,horaingreso as horaingreso,color as color ,marca as marca ,cochera as cochera  from estacionados where id = $id");
			$consulta->execute();
			$estacionadoBuscado= $consulta->fetchObject('vehiculo');
			return $estacionadoBuscado;				

			
	}

	public static function TraerUnFacturado($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,patente as patente, fechaingreso as fechaingreso,fechasalida as fechasalida,importe as importe,horaingreso as horaingreso ,horasalida as horasalida,tiempotranscurrido as tiempotranscurrido,color as color,marca as marca ,cochera as cochera from facturados where id = $id");
			$consulta->execute();
			$estacionadoBuscado= $consulta->fetchObject('vehiculo');
			return $estacionadoBuscado;				

			
	}

	public function diff_sinp($fecha1,$fecha2,$tiempo1,$tiempo2){
		$dif = date("H:i", strtotime("00:00") + strtotime($tiempo2) - strtotime($tiempo1));
		if($dif == '00:00'){
		   $dif = null;
		}
		$difd = date_diff(date_create($fecha1),date_create($fecha2));
		$difd = $difd->format('%a dias');
		return $difd.' '.$dif;
	 }


	public function mostrarDatos()
	{
	  	return "Metodo mostrar:".$this->patente."  ".$this->importe."  ".$this->fechaingreso."  ".$this->fechasalida."  ".$this->horaingreso."  ".$this->horasalida."  ".$this->color."  ".$this->marca."  ".$this->cochera;
	}
public	function strrevpos($instr, $needle)
	{
		$rev_pos = strpos (strrev($instr), strrev($needle));
		if ($rev_pos===false) return false;
		else return strlen($instr) - $rev_pos - strlen($needle);
	}

public	function after ($primera, $segunda)
    {
        if (!is_bool(strpos($segunda, $primera)))
        return substr($segunda, strpos($segunda,$primera)+strlen($primera));
	}
	
	function before ($primera, $segunda)
    {
        return substr($segunda, 0, strpos($segunda, $primera));
	}
	
		
public	function CalcularImporte ($dias, $horas)
    {
		$cantdias= (int) $dias;
		$canthoras= (int) $horas;
		 $preciodias=0;
		 $preciohoras=0;
		 $total=0;
		 

	  if($cantdias > 0   )
	  {
       
       $preciodias=$cantdias*170;

	  }


	  if($canthoras<=1)
	  {
       
       $preciohoras=10;

	  }

	    if($canthoras > 1 && $canthoras < 12 )
	  {
       
       $preciohoras=$canthoras * 10;

	  }

	    if($canthoras ==12 )
	  {
       
       $preciohoras=90;

	  }

         if($canthoras > 12 && $canthoras < 24 )
	  {
       
       $preciohoras=$canthoras * 10;

	  }

      


	  $total=$preciodias+$preciohoras;

        return $total;
    }
}