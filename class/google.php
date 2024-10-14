<?php
	include_once('conexion.php');
	class Google extends Model{

		public function __construct(){ 
     	 	parent::__construct(); 
    	}

	    public function get_lat_lng($value){
			$sql = $this->db->query("SELECT latitud, longitud, nombre, precio, imagen, horario, capacidad, descripcion FROM tbl_mapa WHERE mapa_id = '$value' LIMIT 1");
			$data = [];
			foreach ($sql as $key) {
				$data = [
					'lat' => $key['latitud'],
					'lng' => $key['longitud'],
					'nombre' => $key['nombre'],
					'precio' => $key['precio'],
					'imagen' => $key['imagen'],
					'horario' => $key['horario'],
					'capacidad' => $key['capacidad'],
					'descripcion' => $key['descripcion']
				];
			}    
			return $data;
		}
		

		
	    public function get_stores(){
	    	$sql = $this->db->query("SELECT mapa_id, nombre FROM tbl_mapa ORDER BY nombre");
	    	$option = '';
	    	foreach ($sql as $key){
	    		$id = $key['mapa_id'];
	    		$name = $key['nombre'];
	    		$option .= '<option value="'.$id.'">'.$name.' - B</option>';
	    	}
	    	return $option;
	    }

		public function get_all_stores() {
			$sql = $this->db->query("SELECT latitud, longitud, nombre, precio, imagen, horario, capacidad, descripcion FROM tbl_mapa");
			$stores = [];
			foreach ($sql as $key) {
				$stores[] = [
					'lat' => $key['latitud'],
					'lng' => $key['longitud'],
					'nombre' => $key['nombre'],
					'precio' => $key['precio'],
					'imagen' => $key['imagen'],
					'horario' => $key['horario'],
					'capacidad' => $key['capacidad'],
					'descripcion' => $key['descripcion']
				];
			}
			return $stores;
		}
		
		
	}

	if(isset($_POST['action']) && $_POST['action'] == 'get_all_stores') {
		$class = new Google;
		$stores = $class->get_all_stores();
		exit(json_encode($stores));
	}
	
	if(isset($_POST['value'])){
		$class = new Google;
		$run = $class->get_lat_lng($_POST['value']);
		exit(json_encode($run));
	}
?>