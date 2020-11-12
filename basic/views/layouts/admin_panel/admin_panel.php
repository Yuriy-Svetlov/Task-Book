<?php
use approot\App;
use approot\classes\Sanitize;


$user_identify = App::$user::getIdentify();

$username = Sanitize::html($user_identify['login']);

?>
<!DOCTYPE html>
<html lang="<?php echo $this->lang; ?>">
    <head>
        <title>
            <?php echo Sanitize::html($this->title); ?>
        </title>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- 
            CSRF защита пока не реализована. Пока что нету свободного времени на реализацию.
        <meta name="csrf-param" content="_csrf">
        <meta name="csrf-token" content="">
        -->
        <?php echo $this->meta_tags; ?>
        <?php echo $this->links_head; ?>
        <?php echo $this->style; ?>


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <link rel="stylesheet" href="/media/build/css/admin_panel-min.css">
    </head>

            
    <body>
        <nav>
            <div id="navbar"> 
                <ul>
                    <li>
                        <a id="navbar__BUT_1" href="/">
                            Home
                        </a>
                    </li>                      
                    <li>
                        <a class="navbar_active" id="navbar__BUT_1" href="/admin_panel">
                            Admin panel
                        </a>
                    </li>                                     
                    <li style="float:right;">
                        <a style="margin-right: 10px; text-decoration: underline;" href="/logout">
                            Logout - (<?php echo $username; ?>)
                        </a>
                    </li>                    
                </ul>
            </div> 
        </nav>

        <div>
	        <?php echo $view; ?>
        </div>

        <footer id="footer">
            <div>
                <p>&copy; Yuri Somin <?= date('Y') ?></p>
            </div>
        </footer>

        <script src="/media/js/lib/jquery-3.5.1.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous" defer></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous" defer></script>
        <script src="/media/build/js/admin_panel-min.js" defer></script>

        <?php echo $this->scripts_body; ?>
    </body>
</html>