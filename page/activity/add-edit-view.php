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
?>

<h1>
    <?php if ($edit): ?>
        Edit &nbsp;
    <?php else: ?>
        Add&nbsp;
    <?php endif; ?>
</h1>
<h2> NEW ACTIVITY</h2>

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
            <label>Activity name:</label>
            <input id="name" type="text" name="activity[name]" value="<?php echo Utils::escape($activity->getName()); ?>" />

            <div class="field">
                <label>Activity description:</label>
                <input id="description" type="text" name="activity[description]" value="<?php echo Utils::escape($activity->getDescription()); ?>" />
            </div>

            <div class="wrapper">
<!--                <input type="submit" name="cancel" value="CANCEL" class="submit" />-->
                <input type="submit" name="save" value="<?php echo $edit ? 'EDIT' : 'ADD'; ?>" class="submit" />
            </div>
    </fieldset>
</form>
