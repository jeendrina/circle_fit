
<h1>Welcome!</h1>


<?php if (isset($_SESSION['user_id'])) { ?>
<button><a href="index.php?module=activity&page=add-edit">Book a class</a></button>
<?php }else { ?>
<p>Not a member yet? <a href="index.php?module=auth&page=register">Register now!</a></p>
<p>Already a member? <a href="index.php?module=auth&page=login">Login now!</a></p>
<?php } 


