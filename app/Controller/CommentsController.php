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

/*
    public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid comment'));
    }

    $comment = $this->Comment->findById($id);
    if (!$comment) {
        throw new NotFoundException(__('Invalid comment'));
    }

    $this->loadModel('Post');
        $post = $this->Post->findById($comment['Comment']['post']);
        $this->set('post', $post);
        $this->set('comment', $comment);

    if ($this->request->is(array('post', 'put'))) {
        $this->Comment->id = $id;
        if ($this->Comment->save($this->request->data)) {
            $this->Flash->success(__('Your comment has been updated.'));
            return $this->redirect(['controller' => 'posts','action' => 'view',$comment['Comment']['post']]);
        }
        $this->Flash->error(__('Unable to update your comment.'));
    }

    
}

	public function delete($id = null) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Comment->delete($id)) {
        $this->Flash->success(
            __('The comment with id: %s has been deleted.', h($id))
        );
    } else {
        $this->Flash->error(
            __('The comment with id: %s could not be deleted.', h($id))
        );
    }

     return $this->redirect(['controller' => 'posts', 'action' => 'view',$target]);
}
*/
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