
<h1>
    
    <?php echo Utils::escape($booking->getBookingDate()); ?>
</h1>

<table class="detail">
    <tr>
        <th>Booking</th>
        <td><?php echo Utils::escape(Utils::formatDateTime($booking->getBookingDate())); ?></td>
    </tr>
    <tr>
        <th>Status</th>
        <td><?php echo Utils::escape($booking->getStatus()); ?></td>
    </tr>
</table>
