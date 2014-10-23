<?php

class taskListModel extends ActiveRecord {

    public $table_name = 'task_list';

    public function getNameById($id) {

        if (!empty($id)) {

            $this->where('education_id = ' . $id)->select();


            return $this->vars['education_name'];
        }
    }

}

?>