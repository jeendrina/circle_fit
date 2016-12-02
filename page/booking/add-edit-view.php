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

/* @var $booking Booking */
?>

<h1>
    <?php if ($edit): ?>
        Edit&nbsp;
    <?php else: ?>
        Add&nbsp; 
    <?php endif; ?>
        new Booking
</h1>

<?php if (!empty($errors)): ?>
    <ul class="errors">
        <?php foreach ($errors as $error): ?>
            <?php /* @var $error Error */ ?>
            <li><?php echo $error->getMessage(); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="#" method="post" enctype="multipart/form-data">
    <fieldset>
        <div class="field">
   
   
            <label>Booking date:</label>
            <input id="booking_date" type="text" name="booking[booking_date]" value="<?php echo Utils::escape($booking->getBookingDate()->format('Y-n-j')); ?>"
                   class="text datepicker<?php echo error_field('flight_date', $errors); ?>" />
            
<!--            <label>Activities:</label>
            <select name="activity[name]">
            <?php foreach ($names as $name): ?>
                <option value="<?php echo $name; ?>">
                        <?php echo Utils::escape($name); ?>
                </option>
            <?php endforeach; ?>
            </select>-->
        </div>
<!--        <div class="field">
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
	    <fieldset>
		<table>
		    <tr><td align="right">Upload Image</td>
			<td><input type="file" name="myfile1" /></td></tr>
		</table>
	    </fieldset>
        </div>-->
        <div class="wrapper">
        <!--<input type="submit" name="cancel" value="CANCEL" class="submit" />-->
            <input type="submit" name="save" value="<?php echo $edit ? 'EDIT' : 'ADD'; ?>" class="submit" />
        </div>
    </fieldset>
</form>
