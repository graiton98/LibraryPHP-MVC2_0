<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Feather</title>
        <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.0/normalize.css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/css/style.css">
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
            <div class="center header">
                <!--<div><a href="<?=BASE_URL?>"><img class="logo" src="<?=BASE_URL?>assets/img/logo.png"</a></div>-->
                <div><a href="<?=BASE_URL?>" class="logo"><i class="fas fa-feather-alt"></i>FEATHER</a></div>

                <nav>
                    <ul>
                        <?php if(!isset($_SESSION['userIdentity'])): ?>
                            <li>
                                <a href="<?=BASE_URL?>user/login" class="btn btn-success" role="button" aria-pressed="true">Login</a>
                            </li>
                            <li>
                                <a href="<?=BASE_URL?>user/register" class="btn btn-success" role="button" aria-pressed="true">Register</a>
                            </li>

                        <?php else: ?>
                            <li>
                                <a href="<?=BASE_URL?>user/browse" class="btn btn-secondary" role="button" aria-pressed="true">Profile</a>
                            </li>

                            <li>
                                <a href="#" class="btn btn-secondary" role="button" aria-pressed="true">Reservations</a>
                            </li>
                            <?php if(isset($_SESSION['admin']) || isset($_SESSION['librarian'])):?>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Admin
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a href="<?=BASE_URL?>category/see">Manage Categories</a>
                                  <a href="<?=BASE_URL?>user/seeAll">Manage Users</a>
                                  <a href="<?=BASE_URL?>book/seeAll">Manage Books</a>
                                </div>
                            </div>
                            <?php endif; ?>
                                <li>
                                    <a href="<?=BASE_URL?>user/logout" class="btn btn-danger">Logout</a>
                                </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </header>
        <div id="main-container">


