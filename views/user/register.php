<div class="center">
    <h1>Register</h1>
    <?php if(isset($_SESSION['register'])): ?>
        <?php if(substr($_SESSION['register'], 0, 1) == 'S'): ?>
        <div class="alert alert-success">
            <?=$_SESSION['register']?>
        </div>
        <?php else: ?>
        <div class="alert alert-danger">
            <?=$_SESSION['register']?>
        </div>
        <?php endif; ?>
        <?=Utils::deleteSession('register'); ?>
    <?php endif; ?>
    <form action="<?=BASE_URL?>user/saveRegister" method="POST">             
        <div class="form-group">
            <label for="username">Username<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="text" name="username" required="" placeholder="Enter Username" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter Username'"/>
        </div>
        <div class="form-group">
            <label for="password">Password<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="password" name="password" required="" placeholder="Enter Password" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter Password'"/>
        </div>
        <div class="form-group">
            <label for="name_user">Name<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="text" name="name_user" required="" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter your name'"/>
        </div>
        <div class="form-group">
            <label for="first_surname">First Surname<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="text" name="first_surname" required="" placeholder="Enter your first surname" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter your first surname'"/>
        </div>
        <div class="form-group">
            <label for="dni">Dni<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="text" name="dni" required="" placeholder="Enter your dni" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter your dni'"/>
        </div>
        <div class="form-group">
            <label for="email">Email<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="email" name="email" required="" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter your email'"/>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="number" name="phone_number" required="" placeholder="Enter your phone number" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter your phone number'"/>
        </div>
        <div class="form-group">
            <?php if(isset($_SESSION['admin'])):?>
            <label for="type_of_user">Type of User<span class="text-danger font-weight-bold">*</span></label>
                <?php $types = Utils::getTypesOfUser($_SESSION['userIdentity']->type_of_user)?>
                <select name="type_of_user" class="form-control">
                    <?php while($type = $types->fetch_object()): ?>
                        <option value="<?=$type->id?>"><?=$type->name?></option>
                    <?php endwhile; ?>
                </select>
            <?php endif; ?>
        </div>
        <input class="btn btn-primary mb-2" type="submit" value="Register" name="register" />
     </form>
</div>