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
        Add&nbsp;
    <?php endif; ?>
</h1>
<h2> new User </h2>

<?php if (!empty($errors)): ?>
    <ul class="errors">
        <?php foreach ($errors as $error): ?>
            <?php /* @var $error Error */ ?>
            <li><?php echo $error->getMessage(); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="#" method="post">
    <fieldset>
        <div class="field">
            <label>FIRST NAME:</label>
            <input id="first_name" type="text" name="user[first_name]" value="<?php echo Utils::escape($user->getFirstName()); ?>" />

            <div class="field">
                <label>LAST NAME:</label>
                <input id="last_name" type="text" name="user[last_name]" value="<?php echo Utils::escape($user->getLastName()); ?>" />
            </div>

            <div class="wrapper">
                <!--<input type="submit" name="cancel" value="CANCEL" class="submit" />-->
                <input type="submit" name="save" value="<?php echo $edit ? 'EDIT' : 'ADD'; ?>" class="submit" />
            </div>
    </fieldset>
</form>
