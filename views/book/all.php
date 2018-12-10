<div class="center">
    <h1>List of Book</h1>
    <?php if(isset($_SESSION['book'])): ?>
        <?php if(substr($_SESSION['book'], 0, 1) == 'S'): ?>
        <div class="alert alert-success">
            <?=$_SESSION['book']?>
        </div>
        <?php else: ?>
        <div class="alert alert-danger">
            <?=$_SESSION['book']?>
        </div>
        <?php endif; ?>
        <?=Utils::deleteSession('book'); ?>
    <?php endif; ?>
    <a href="<?=BASE_URL?>book/add" class="btn btn-success"><i class="fas fa-plus"></i>Add Book</a>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Isbn</th>
                <th scope="col">Name</th>
                <th scope="col">Copies</th>
                <th scope="col">Browse</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while($book = $books->fetch_object()): ?>
                <tr scope="row">
                    <td>
                       <?=$book->id?>
                    </td>
                    <td>
                       <?=$book->isbn?>
                    </td>
                     <td>
                       <?=$book->name_book?>
                    </td>
                     <td>
                       <a href="<?=BASE_URL?>copy/seeAll&id=<?=$book->id?>"><i class="fas fa-copy"></i></a>
                    </td>
                    <td>
                        <a href="<?=BASE_URL?>book/browse&id=<?=$book->id?>"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                    <td>
                        <a href="<?=BASE_URL?>book/delete&id=<?=$book->id?>"><i class="fas fa-times"></i></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
        
    </table>
</div>

