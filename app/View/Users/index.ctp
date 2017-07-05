<h1>Blog Users</h1>
<?= $this->Html->link('Add', ['controller'=>'users', 'action' => 'add'])?>
<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Role</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($user['User']['username'],
array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>

        </td>
        <td><?php echo $user['User']['role']; ?></td>
        <td><?php echo $user['User']['created']; ?></td>
        <td><?php echo $this->Html->link('Edit',
array('controller' => 'user', 'action' => 'edit', $user['User']['id'])); ?>|<?php echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $user['User']['id']),
                    array('confirm' => 'Delete User: '.$user['User']['username']. ', permenantly?')
                ); ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>