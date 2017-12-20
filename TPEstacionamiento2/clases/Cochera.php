<?php
class Cochera
{
	public $id;
 	
	public $cochera;  




 	
	public static function TraerTodasLasCocheras()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,cochera as cochera  from cocheras");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Cochera");		
	}


	public static function OcuparCochera($id)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE cocheras SET disponible='NO' WHERE id=$id");
			$consulta->execute();
			
	}

	public static function LiberarCochera($id)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE cocheras SET disponible='SI' WHERE id=$id");
			$consulta->execute();			
						
	}
	


}