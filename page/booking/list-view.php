<h1>BOOKINGS</h1>

<?php if (empty($bookings)): ?>
    <p>No bookings found.</p>
<?php else: ?>
    <ul class="list">
        <?php foreach ($bookings as $booking): ?>
            <li>                
                <h3><a href="<?php echo Utils::createLink('detail', array('id' => $booking->getBookingId(), 'module' => 'booking'))
            ?>"><?php echo Utils::formatDate($booking->getBookingDate()); ?></a></h3> 
                <a href="#"><?php echo Utils::escape($booking->getUser()->getFirstName()) . ' ' . Utils::escape($booking->getUser()->getLastName()); ?></a>
                                 <p><span class="label">Booking date:</span> <?php
               echo Utils::escape(Utils::formatDate($booking->getBookingDate()));
            ?></p>
                <p><a href="index.php?module=booking&page=add-edit&id=<?php echo $booking->getBookingId() ?>">Edit</a>
                    | <a href="index.php?module=booking&page=delete&id=<?php echo $booking->getBookingId() ?>">Delete</a></p>
            </li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>
