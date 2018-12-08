<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Feather</title>
        <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.0/normalize.css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"  crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
        $( function() {
          $( "#datepicker" ).datepicker({ minDate: 0 });
        } );
        </script>
    </head>
    <body>
        <header>
            <div class="logo"><a href="<?=BASE_URL?>">Feather</a></div>
            
            <nav>
                <ul>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <?php if(!isset($_SESSION['userIdentity'])): ?>
                        <li>
                            <a href="<?=BASE_URL?>user/login">Login</a>
                        </li>
                        <li>
                            <a href="<?=BASE_URL?>user/register">Register</a>
                        </li>
                        
                    <?php else: ?>
                        <li>
                            <a href="<?=BASE_URL?>user/browse">Edit Profile</a>
                        </li>

                        <li>
                            <a href="#">My Reservations</a>
                        </li>
                        <?php if(isset($_SESSION['admin']) || isset($_SESSION['librarian'])):?>
                        
                            <li>
                                <a href="<?=BASE_URL?>category/see">Manage Categories</a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL?>user/seeAll">Manage Users</a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL?>book/seeAll">Manage Books</a>
                            </li>
                        <?php endif; ?>
                            <li>
                                <a href="user/logout">Logout</a>
                            </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>
        <div id="main-container">


