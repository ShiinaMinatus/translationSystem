<?php


class compensationBLL {


	public $compensation_id;

	public $compensation_min;

	public $compensation_max;

	public $unit;

	public $compensation_between;

	public $compensation_describe;

	public function info(){

		$compensationDal = new compensationModel();

		$compensationDal->select();

		if($compensationDal->vars_number > 0){

			$array = array();

			foreach ($compensationDal->vars_all as $key => $value) {

				$compensationObject = new compensationBLL();

				$compensationObject->compensation_id = $value['compensation_id'];

				$compensationObject->compensation_between = $value['compensation_min'].'~'.$value['compensation_max'];

				$compensationObject->compensation_describe = $value['compensation_describe'];
				
				$array[] = $compensationObject;
			}
			
			return $array;

		}

	}


}
?>