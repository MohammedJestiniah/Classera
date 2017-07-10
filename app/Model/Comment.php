<?php

class Comment extends AppModel {

	 public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );

    public function isOwnedBy($comment_id, $user_id)
    {
        return $this->field('id', array('id' => $comment_id, 'user_id' => $user_id)) !== false;
    }
    
}

?>