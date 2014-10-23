<?php


class compensationModel  extends ActiveRecord {

   
   public $table_name = 'compensation';



	public function getNameById( $id ) {

		if ( !empty( $id ) ) {

			$this->where( 'compensation_id = '.$id )->select();


			return $this->vars['compensation_min'].'-'.$this->vars['compensation_max'];
		}

	}

}



?>