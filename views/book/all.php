<div class="content">
    <h1>List of Book</h1>
    <!-- Ensenyar els errors-->
    <?php 
        if(isset($_SESSION['book'])){
            echo $_SESSION['book']; 
            Utils::deleteSession('book');     
        } 
    ?>
    <a href="<?=BASE_URL?>book/add"><i class="fas fa-plus"></i>Add Book</a>
    <table>
        <tr>
            <th>id</th>
            <th>Isbn</th>
            <th>Name</th>
            <th>Copies</th>
            <th>Browse</th>
            <th>Delete</th>
        </tr>
        <?php while($book = $books->fetch_object()): ?>
            <tr>
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
                   <a href="<?=BASE_URL?>book/copies&id=<?=$book->id?>"><i class="fas fa-copy"></i></a>
                </td>
                <td>
                    <a href="<?=BASE_URL?>book/browse&id=<?=$book->id?>"><i class="fas fa-pencil-alt"></i></a>
                </td>
                <td>
                    <a href="<?=BASE_URL?>book/delete&id=<?=$book->id?>"><i class="fas fa-times"></i></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

