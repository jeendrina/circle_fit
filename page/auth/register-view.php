<?php

function error_field($title, array $errors) {
    foreach ($errors as $error) {
        /* @var $error Error */
        if ($error->getSource() == $title) {
            return ' error-field';
        }
    }
    return '';
}

/* @var $user User */
?>

<h1>
    <?php if ($edit): ?>
        Edit &nbsp;
    <?php else: ?>
        NEW USER&nbsp;
    <?php endif; ?>
</h1>
<h2> Enter your details </h2>

<?php if (!empty($errors)): ?>
    <ul class="errors">
        <?php foreach ($errors as $error): ?>
            <?php /* @var $error Error */ ?>
            <li><?php echo $error->getMessage(); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
 <div class="col-md-6 col-md-offset-3">
<form action="#" method="post">
    <fieldset>
        <div class="field">
            <div class="form-group"> 
            <label>FIRST NAME:</label>
            <input id="first_name"class="form-control"  type="text"  placeholder="First name"  name="user[first_name]" value="<?php echo Utils::escape($user->getFirstName()); ?>" />
          </div>
            <div class="field">
                <label>LAST NAME:</label>
                <input id="last_name" type="text"  placeholder="Last name" name="user[last_name]" value="<?php echo Utils::escape($user->getLastName()); ?>" />

                <div class="field">
                    <label>EMAIL:</label>
                    <input id="email" type="text"   placeholder="Email"  name="user[email]" value="<?php echo Utils::escape($user->getEmail()); ?>" />
                </div>

                <div class="field">
                    <label>PASSWORD:</label>
                    <input id="password" type="text"  placeholder="Password"  name="user[password]" value="<?php echo Utils::escape($user->getPassword()); ?>" />
                </div>
                
<!--                <div class="field">
                    <label>CONFIRM PASSWORD:</label>
                    <input id="confirmpassword" type="text" name="user[confirmpassword]" value="<?php echo Utils::escape($user->getPassword()); ?>" />

                </div>-->

                <div class="wrapper">
                    <input type="submit" name="cancel" value="CANCEL" class="submit" />

                    <input type="submit" name="save" value="<?php echo $edit ? 'EDIT' : 'ADD'; ?>" class="submit" />
                </div>
                </fieldset>
                </form>
   </div>
