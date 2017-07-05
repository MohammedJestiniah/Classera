<?php
class Post extends AppModel {
    

    public $hasMany = [
        'Comment' => [
            'className' => 'Comment',
            'foreignKey' => 'post',
            'order' => 'Comment.created DESC',
            'dependent' => true
        ]
    ];

    public function isOwnedBy($post, $user) {
    return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
}
}