<div class="center">
    <h1>Profile</h1>
    <form class="form-group" action="<?=BASE_URL?>user/saveUpdate&id=<?=$user->getId()?>" method="POST">
        <div class="form-group">
            <label for="username">Username<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="text" name="username" required="" value="<?=$user->getUsername()?>"/>
        </div>
        <!--<div class="label-input">
            <label for="password">Password</label>
            <input type="password" name="password" required="" value="<?=$user->getPassword()?>"/>
        </div>-->
        <div class="form-group">
            <label for="name_user">Name<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="text" name="name_user" required="" value="<?=$user->getName_user()?>"/>
        </div>
        <div class="form-group">
            <label for="first_surname">First Surname<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="text" name="first_surname" required="" value="<?=$user->getFirst_surname()?>"/>
        </div>
        <div class="form-group">
            <label for="dni">Dni<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="text" name="dni" required="" value="<?=$user->getDni()?>"/>
        </div>
        <div class="form-group">
            <label for="email">Email<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="email" name="email" required="" value="<?=$user->getEmail()?>"/>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="number" name="phone_number" required="" value="<?=$user->getPhone_number()?>"/>
        </div>
        <?php if(isset($_GET['id'])): ?>
            <?php if(isset($_SESSION['admin'])):?>
                <div class="form-group">
                    <?php $types = Utils::getTypesOfUser($_SESSION['userIdentity']->type_of_user)?>
                    <label for="type_of_user">Type of User<span class="text-danger font-weight-bold">*</span></label>
                    <select name="type_of_user" class="form-control">
                        <?php while($type = $types->fetch_object()): ?>
                            <?php if($type->id === $user->getType_of_user()):?>
                                <option value="<?=$type->id?>" selected="selected"><?=$type->name?></option>
                            <?php else: ?>
                                <option value="<?=$type->id?>"><?=$type->name?></option>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </select>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <input type="submit" name="update" value="Update" class="btn btn-primary mb-2"/>
    </form>
</div>