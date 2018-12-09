<div class="content">
    <h1>New Book</h1>
    <form action="<?=BASE_URL?>book/register" method="POST" enctype="multipart/form-data">
        <div class="label-input">
            <label for="isbn">Isbn</label>
            <input type="number" name="isbn" minlength="13" maxlength="13" required=""/>
        </div>
        <div class="label-input">
            <label for="name">Name</label>
            <input type="text" name="name" required=""/>
        </div>
        <div class="label-input">
            <label for="category">Category</label>
            <select name="category">
            <?php 
                $categories = Utils::showCategories();
                while ($cat = $categories->fetch_object()): 
                ?>
                <option value="<?=$cat->id?>">
                    <?=$cat->name_category?>
                </option>
            <?php endwhile; ?>
            </select>
        </div>
        <div class="label-input">
            <label for="author">Author</label>
            <select name="author">
            <?php 
                $authors = Utils::getAuthors();
                while ($aut = $authors->fetch_object()): 
                ?>
                <option value="<?=$aut->id?>">
                    <?=$aut->name_author ." ".$aut->first_surname?>
                </option>
            <?php endwhile; ?>
            </select>
        </div>
        <div class="label-input">
            <label for="description">Description</label>
            <textarea cols="35" rows="12" name="description" id="description" required=""></textarea>
        </div>
        <div class="label-input widget">
            <label for="outstanding">Outstanding</label>
            <input type="checkbox" name="outstanding" />
        </div>
        <div class="label-input">
            <label for="img">Cover Page</label>
            <input type="file" name="img" required=""/>
        </div>
        <input type="submit" value="Add" name="add" />
    </form>
</div>

