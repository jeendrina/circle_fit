<?php ?>

<h1>
    <?php if ($tooLate): ?>
        <img src="img/exclamation.png" alt="" title="Should be already done!" />
    <?php endif; ?>
    <?php echo Utils::escape($activity->getName()); ?>
    <?php echo Utils::escape($activity->getDescription()); ?>
</h1>

<table class="detail">
    <tr>
        <th>Priority</th>
        <td><img src="img/priority/<?php echo $activity->getPriority(); ?>.png" alt="Priority <?php echo $activity->getPriority(); ?>" title="Priority <?php echo $activity->getPriority(); ?>" /></td>
    </tr>

    <tr>
        <th>Created On</th>
        <td><?php echo Utils::escape(Utils::formatDateTime($activity->getCreatedOn())); ?></td>
    </tr>
    <tr>
        <th>Due On</th>
        <td>
            <?php if ($tooLate): ?><span class="too-late"><?php endif; ?>
            <?php echo Utils::escape(Utils::formatDateTime($activity->getDueOn())); ?>
                <?php if ($tooLate): ?></span><?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Last Modified On</th>
        <td><?php echo Utils::escape(Utils::formatDateTime($activity->getLastModifiedOn())); ?></td>
    </tr>

    <tr>
        <th>Description</th>
        <td><?php echo Utils::escape($activity->getDescription()); ?></td>
    </tr>

    <tr>
        <th>Status</th>
        <td><img src="img/status/<?php echo $activity->getStatus(); ?>.png" alt="" title="<?php echo Utils::capitalize($activity->getStatus()); ?>" class="icon" /></td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <th></th>
        <td>
            <div class="statuses">
                <?php foreach (User::allStatuses() as $status): ?>
                    <?php if ($status != $activity->getStatus()): ?>
                        <a href="<?php echo Utils::createLink('change-status', array('id' => $activity->getActivityId(), 'status' => $status)); ?>" title="Change ACTIVITY status to <?php echo Utils::capitalize($status); ?>." class="change-status-link"
                           ><img src="img/status/<?php echo $status; ?>.png" alt="" title="Make it <?php echo Utils::capitalize($status); ?>." class="icon" /></a>
                       <?php else: ?>
                        <img src="img/status/<?php echo $status; ?>-disabled.png" alt="" title="This ACTIVITIES is already <?php echo Utils::capitalize($status); ?>." class="icon" />
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="actions">
                <a href="<?php echo Utils::createLink('add-edit', array('id' => $activity->getActivityId())); ?>"><img src="img/action/edit.png" alt="" title="Edit it." class="icon" /></a>
                <a href="<?php echo Utils::createLink('delete', array('id' => $activity->getActicityd())); ?>" id="delete-link"><img src="img/action/delete.png" alt="" title="Delete it." class="icon" /></a>
            </div>
        </td>
    </tr>
</table>

<p>
    <?php $backLink = Utils::createLink('list', array('status' => $activity->getStatus())); ?>
    <a href="<?php echo $backLink; ?>"><img src="img/action/back.png" alt="" title="Back to the list." class="icon"/></a>&nbsp;
    <a href="<?php echo $backLink; ?>">To the list</a>
</p>

<div id="delete-dialog" title="Delete this USER?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This ACTIVITY will be deleted. Are you sure?</p>
</div>
<div id="change-status-dialog">
    <form id="change-status-form" method="post">
        <fieldset>
            <div class="field">
                <label>Comment:</label>
                <textarea name="comment" cols="1" rows="1"></textarea>
            </div>
        </fieldset>
    </form>
</div>
