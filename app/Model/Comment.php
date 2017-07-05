<?php

class Comment extends AppModel {

    public function isOwnedBy($comment_id, $user_id)
    {
        return $this->field('id', array('id' => $comment_id, 'user_id' => $user_id)) !== false;
    }
    
}

?>