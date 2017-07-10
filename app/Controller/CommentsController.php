<?php
// File: /app/Controller/CommentsController.php
class CommentsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');


    public function add() {
    if ($this->request->is('post')) {
        //Added this line
        $this->request->data['Comment']['user_id'] = $this->Auth->user('id');
        if ($this->Comment->save($this->request->data)) {
            $this->Flash->success(__('Your comment has been saved.'));
             return $this->redirect(['controller' => 'posts', 'action' => 'view',$this->request->data['Comment']['post']]);
            }
            $this->Flash->error(__('Unable to add your post!'));
        }
    }


public function isAuthorized($user) {
    // All registered users can add comments
    if ($this->action === 'add') {
        return true;
    }

    // The owner of a comment can edit and delete it
    if (in_array($this->action, array('edit', 'delete'))) {
        $commentId = (int) $this->request->params['pass'][0];
        if ($this->Comment->isOwnedBy($commentId, $user['id'])) {
            return true;
        }
    }

    return parent::isAuthorized($user);
}
}