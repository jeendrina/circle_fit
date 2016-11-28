<?php


//~ Template for list.php
// variables:
//  $title - page title
//  $status - status of TODOs to be displayed
//  $todos - TODOs to be displayed

?>

<h1>Bookings</h1>

<?php if (empty($activities)): ?>
    <p>No bookings found.</p>
<?php else: ?>
    <ul class="list">
        <?php foreach ($activities as $activity): ?>
            <li>                
                <h3><a href="<?php echo Utils::createLink('detail', 
                        array('id' => $activity->getId())) ?>"><?php 
                        echo Utils::escape($activity->getflightName()); ?></a></h3>                
                <p><span class="label">Flight date:</span> <?php 
                echo Utils::escape(Utils::formatDateTime($activity->getFlightDate())); 
                ?></p>
                <p><a href="index.php?module=booking&page=add-edit&id=<?php echo $activity->getId()?>">Edit</a>
                <a href="index.php?module=booking&page=delete&id=<?php echo $activity->getId()?>">Delete</a></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
