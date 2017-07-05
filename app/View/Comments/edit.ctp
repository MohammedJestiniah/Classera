<h1><?php echo h($post['Post']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo h($post['Post']['body']); ?></p>

<h3>Edit Comment</h3>
<?php
    echo $this->Form->create('Comment');
    echo $this->Form->input('title', ['value' => $comment['Comment']['title']]);
    echo $this->Form->input('body', ['rows' => '3', 'value' => $comment['Comment']['body']]);
    echo $this->Form->end('Save Post');
?>