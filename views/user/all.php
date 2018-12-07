<div class="content">
    <h1>List of Users</h1>
    <a href="<?=BASE_URL?>user/register"><i class="fas fa-plus"></i>Add User</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Browse</th>
            <th>Delete</th>
        </tr>
        <?php while($user = $users->fetch_object()): ?>
            <tr>
                <td>
                   <?=$user->id?>
                </td>
                <td>
                   <?=$user->username?>
                </td>
                 <td>
                   <?=$user->name_user?>
                </td>
                 <td>
                   <?=$user->first_surname?>
                </td>
                <td>
                    <a href="<?=BASE_URL?>user/browse&id=<?=$user->id?>"><i class="fas fa-pencil-alt"></i></a>
                </td>
                <td>
                    <a href="<?=BASE_URL?>user/delete&id=<?=$user->id?>"><i class="fas fa-times"></i></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>


