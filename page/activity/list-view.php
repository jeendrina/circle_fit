<?php ?>

<h1>ACTIVITIES</h1>

<?php if (empty($activities)): ?>
    <p>No activities found.</p>
<?php else: ?>
    <ul class="list">
        <?php foreach ($activities as $activity): ?>
            <li>                
                <h3><a href="<?php echo Utils::createLink('detail', array('id' => $activity->getActivityId()))
            ?>"><?php echo Utils::escape($activity->getName()); ?></a></h3>                
                <p><?php  echo Utils::escape($activity->getDescription());   ?>   </p>         
                <p><a href="index.php?module=activity&page=add-edit&id=<?php echo $activity->getActivityId() ?>">Edit</a>
                    <a href="index.php?module=activity&page=delete&id=<?php echo $activity->getActivityId() ?>">Delete</a></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

