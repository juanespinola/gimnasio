<?php
	include_once('conexion.php');

	class Procesar extends Model{

		public function __construct(){ 
     	 	parent::__construct(); 
    	}

	    public function build_report($year){
	    	$total = array();
	    	for($i=0; $i<12; $i++){
	
	    		$total[$i] = 0;
	    	
	    	}			 
			return $total;
	    }

	}

	if($_POST['year']){
	;
		exit(json_encode(2020));
	}
?>