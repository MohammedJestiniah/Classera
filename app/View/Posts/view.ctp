

<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($post['Post']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo h($post['Post']['body']); ?></p>

 <h3>Add Comment</h3>
<?php
    echo $this->Form->create('Comment', ['url' => ['controller' => 'comments', 'action' => 'add']]);
    echo $this->Form->input('title');
    echo $this->Form->input('body', ['rows' => '3']);
    echo $this->Form->hidden('post', ['type' => 'number', 'value' => $post['Post']['id']] );
    echo $this->Form->end('Save Comment');
?>


    <?= 'Comments: '.count($post['Comment']);?>
    	<hr>
    <?php foreach($post['Comment'] as $comment): ?>
    <div>
        <h3><?=$comment['title']?></h3> 
        <p><?=$comment['body']?></p>
        <p><small><?='Created by: '.$comment['user_id']?></small></p>
        <p><small><?='Created at: '.$comment['created'].', Modified at: '.$comment['modified']?></small></p>
        <hr>
    </div>
    <?php endforeach ?>
</div>
