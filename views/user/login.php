<div class="center">
    <h1>Login</h1>
    <?php if(isset($_SESSION['error_login'])): ?>
        <h1>LOGIN ERROR</h1>
        <?php Utils::deleteSession('error_login') ?>
    <?php endif; ?>
    <form action="<?=BASE_URL?>user/saveLogin" method="POST">
        <div class="form-group">
            <label for="username">Username<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="text" name="username" required="" placeholder="Enter Username" onfocus="this.placeholder = ''" onblur="this.placeholder='Enter Username'"/>
        </div>
        <div class="form-group">
            <label for="password">Password<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="password" name="password" required="" placeholder="Enter Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Password'"/>
        </div>
        <input type="submit" class="btn btn-primary mb-2" value="Login"/>
    </form>
</div>
