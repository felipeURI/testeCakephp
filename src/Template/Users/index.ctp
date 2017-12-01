<h1>Blog users</h1>
<p><?= $this->Html->link('Adicionar user', ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Created</th>
        <th>Password </th>
        <th>role</th>
    </tr>


    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user->id ?></td>
        <td>
            <?= $this->Html->link($user->username, ['action' => 'view', $user->id]) ?>
        </td>
        <td>
            <?= $user->created ?>
        </td>
        <td><?=$user->password ?></td>
        <td><?=$user->role ?></td>
    </tr>
    <?php endforeach; ?>

</table>
