<h2>Lala</h2>
<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Created</th>
        <th>Password </th>
        <th>role</th>
    </tr>
<tr>
    <td><?= $user->id ?></td>
    <td>
        <?= $user->username ?>
    </td>
    <td>
        <?= $user->created ?>
    </td>
    <td><?=$user->password ?></td>
    <td><?=$user->role ?></td>
</tr>
