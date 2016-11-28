<?php


//~ Template for add-edit.php
// variables:
//  $errors - validation errors
//  $todo - submitted TODO
//  $edit - true for EDIT, false for ADD

function error_field($title, array $errors) {
    foreach ($errors as $error) {
        /* @var $error Error */
        if ($error->getSource() == $title) {
            return ' error-field';
        }
    }
    return '';
}

/* @var $activity User */
?>

<h1>
    <?php if ($edit): ?>
        Edit &nbsp;
    <?php else: ?>
        Add&nbsp;
    <?php endif; ?>
</h1>
        <h2> new Booking </h2>

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
            <label>Flight name:</label>
            <select name="booking[flight_name]">
                <?php foreach ($flightNames as $flightName): ?> 
                <option value="<?php echo $flightName; ?>"
                        <?php if ($activity->getFlightName() == $flightName): ?>
                            selected="selected"
                        <?php endif; ?>
                        ><?php echo $flightName; ?>
                </option>
                <?php endforeach; ?>
            </select>
           
            <div class="field">
                <label>Flight date:</label>
                <input id="flight_date" type="text" name="booking[flight_date]" value="<?php echo Utils::escape($activity->getFlightDate()->format('y-n-j')); ?>"
                       class="text datepicker<?php echo error_field('flight_date', $errors); ?>" />
            </div>

            <div class="wrapper">
                <!--<input type="submit" name="cancel" value="CANCEL" class="submit" />-->
                <input type="submit" name="save" value="<?php echo $edit ? 'EDIT' : 'ADD'; ?>" class="submit" />
            </div>
    </fieldset>
</form>
