<div class="center">
    <h1>Authors</h1>
    <?php if(isset($_SESSION['author'])):?>
    <div class="alert alert-success">
        <?=$_SESSION['author']?>
        <?=Utils::deleteSession('author')?>
    </div>
    <?php endif; ?>
    <a href="<?=BASE_URL?>author/add" class="btn btn-success"><i class="fas fa-plus"></i>Add Author</a>
    <table class="table">
         <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">First Surname</th>
                <th scope="col">Browse</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while($aut = $authors->fetch_object()): ?>
            <tr>
                <td scope="row"><?=$aut->id?></td>
                <td scope="row"><?=$aut->name_author?></td>
                <td scope="row"><?=$aut->first_surname?></td>
                <td scope="row"><a href="<?=BASE_URL?>author/add&id=<?=$aut->id?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td scope="row"><a href="<?=BASE_URL?>author/delete&id=<?=$aut->id?>"><i class="fas fa-times"></i></i></a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

