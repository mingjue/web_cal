<?php
	//var_dump ($_POST['nums']);
	//print_r ($_POST['ops']);
	$numberHolder = $_POST['nums'];
	$operHolder = $_POST['ops'];
	
	jisuan();
	function jisuan(){
		global $numberHolder,$operHolder;
		// var_dump($numberHolder);
		// var_dump($operHolder);
		for ($i =0; $i< count($operHolder);$i++ ){
			if($operHolder[$i] == '*'){
				$numberHolder[$i] *= $numberHolder[$i+1];
				//remove the op and number
				remove($i--);
			}elseif ($operHolder[$i] == '/'){
				$numberHolder[$i] /= $numberHolder[$i+1];
				remove($i--);
			}
		}
		for ($i =0; $i< count($operHolder);$i++ ){
			if($operHolder[$i] == '+'){
				$numberHolder[$i] += $numberHolder[$i+1];
				remove($i--);
			}elseif($operHolder[$i] == '-'){
				$numberHolder[$i] -= $numberHolder[$i+1];
				remove($i--);
			}
		}
		echo $numberHolder[0];
		//echo "shit";
	}

	function remove($i){
		global $numberHolder,$operHolder;
		unset($numberHolder[$i+1]);
		$numberHolder = array_values($numberHolder);
		unset($operHolder[$i]);
		$operHolder = array_values($operHolder);
	}
?>