<div class="content">
    <h1>Categories</h1>
    <a href="<?=BASE_URL?>category/add"><i class="fas fa-plus"></i>Add Category</a>
    <table>
      <tr>
        <th>Id</th>
        <th>Category Name</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
          <?php while($cat = $categories->fetch_object()): ?>
            <tr>
                <td>
                   <?=$cat->id?>
                </td>
                <td>
                   <?=$cat->name_category?>
                </td>
                <td>
                    <a href="<?=BASE_URL?>category/edit&id=<?=$cat->id?>"><i class="fas fa-pencil-alt"></i></a>
                </td>
                <td>
                    <a href="<?=BASE_URL?>category/delete&id=<?=$cat->id?>"><i class="fas fa-times"></i></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
