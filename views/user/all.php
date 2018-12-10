<div class="center">
    <h1>List of Users</h1>
    <a href="<?=BASE_URL?>user/register" class="btn btn-success"><i class="fas fa-plus"></i>Add User</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Username</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Browse</th>
                <th scope="col">Delete</th>
                <th scope="col">Reservations & Borrows</th>
            </tr>
        </thead>
        <tbody>
            <?php while($user = $users->fetch_object()): ?>
                <tr>
                    <td scope="row">
                       <?=$user->id?>
                    </td>
                    <td scope="row">
                       <?=$user->username?>
                    </td>
                     <td scope="row">
                       <?=$user->name_user?>
                    </td>
                     <td scope="row">
                       <?=$user->first_surname?>
                    </td>
                    <td scope="row">
                        <a href="<?=BASE_URL?>user/browse&id=<?=$user->id?>"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                    <td scope="row">
                        <a href="<?=BASE_URL?>user/delete&id=<?=$user->id?>"><i class="fas fa-times"></i></a>
                    </td>
                    <td scope="row">
                        <a href="<?=BASE_URL?>user/reservationBorrow&id=<?=$user->id?>"><i class="fas fa-paper-plane"></i></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>


