<div class="center">
    <h1>Copies of <?=$book->getName_book()?></h1>
    <?php if(isset($_SESSION['copy'])): ?>
        <?php if(substr($_SESSION['copy'], 0, 1) == 'S'):?>
            <div class="alert alert-success">
                <?=$_SESSION['copy']?>
            </div>
        <?php else: ?>
            <div class="alert alert-danger">
                <?=$_SESSION['copy']?>
            </div>
        <?php endif; ?>
        <?=Utils::deleteSession('copy');?>
    <?php endif; ?>
    <a href="<?=BASE_URL?>copy/add&bookId=<?=$book->getId()?>" class="btn btn-success">Add Copy</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Status</th>
                <th scope="col">Browse</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while($copy = $copies->fetch_object()):?>
            <tr>
                <td scope="row"><?=$copy->id?></td>
                <td scope="row"><?=$copy->status?></td>
                <td scope="row"><a href="<?=BASE_URL?>copy/browse&bookId=<?=$book->getId()?>&id=<?=$copy->id?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td scope="row"><a href="<?=BASE_URL?>copy/delete&bookId=<?=$book->getId()?>&id=<?=$copy->id?>"><i class="fas fa-times"></i></a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

