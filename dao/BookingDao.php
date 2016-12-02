<?php

class BookingDao {

    /** @var PDO */
    private $db = null;

    public function __destruct() {
        // close db connection
        $this->db = null;
    }

    /**
     * Find all {@link Booking}s by search criteria.
     * @return array array of {@link Booking}s
     */
    public function find($sql) {
//        $result = array();

        foreach ($this->query($sql) as $row) {
            $booking = new Booking();
            BookingMapper::map($booking, $row);
//            $result[$booking->getId()] = $booking;
            $result [] = $booking;
        }
        return $result;
    }

    /**
     * Find {@link Booking} by identifier.
     * @return Booking or <i>null</i> if not found
     */
    public function findById($id) {
        $row = $this->query('SELECT * FROM bookings WHERE status != "deleted" and booking_id = ' . (int) $id)->fetch();
        if (!$row) {
            return null;
        }
        $booking = new Booking();
        BookingMapper::map($booking, $row);
        return $booking;
    }

    /**
     * Save {@link Booking}.
     * @param User $booking {@link Booking} to be saved
     * @return User saved {@link Booking} instance
     */
    public function save(Booking $booking) {
        if ($booking->getBookingId() === null) {
            return $this->insert($booking);
        }
        return $this->update($booking);
    }

    /**
     * Delete {@link Booking} by identifier.
     * @param int $id {@link Booking} identifier
     * @return bool <i>true</i> on success, <i>false</i> otherwise
     */
    public function delete($id) {
        $sql = '
            UPDATE bookings SET
                status = :status
            WHERE
                booking_id = :id';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            ':status' => 'deleted',
            ':id' => $id,
        ));
        return $statement->rowCount() == 1;
    }

    /**
     * @return PDO
     */
    private function getDb() {
        if ($this->db !== null) {
            return $this->db;
        }
        $config = Config::getConfig("db");
        try {
            $this->db = new PDO($config['dsn'], $config['username'], $config['password']);
        } catch (Exception $ex) {
            throw new Exception('DB connection error: ' . $ex->getMessage());
        }
        return $this->db;
    }

    /**
     * @return Booking
     * @throws Exception
     */
    private function insert(Booking $booking) {
        $now = new DateTime();
        $booking->setbookingId(null);
        $booking->setStatus('pending');
        $sql = '
              INSERT INTO bookings (booking_id, booking_date, status, user_id, activity_id)
                VALUES (:booking_id, :booking_date, :status, :user_id, :activity_id)';
        return $this->execute($sql, $booking);
    }

    /**
     * @return Booking
     * @throws Exception
     */
    private function update(Booking $booking) {
        $sql = '
            UPDATE bookings SET
                booking_date = :booking_date,
                status = :status,
                user_id = :user_id,
                activity_id = :activity_id
            WHERE
                booking_id = :booking_id';
        return $this->execute($sql, $booking);
    }

    /**
     * @return Booking
     * @throws Exception
     */
    private function execute($sql, Booking $booking) {
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($booking));
        if ($booking->getBookingId()) {
            return $this->findById($this->getDb()->lastInsertId());
        }
        return $booking;
    }

    private function getParams(Booking $booking) {
        //:id,:flight_name, :flight_date, :date_created, :status, :user_id
        $params = array(
            ':booking_id' => $booking->getBookingId(),
            ':booking_date' => self::formatDateTime($booking->getBookingDate()),
            ':status' => $booking->getStatus(),
            ':user_id' => $booking->getUserId(),
            ':activity_id' => $booking->getActivityId(),
        );
//        var_dump($booking);
//        echo '<br>';
//        var_dump($params);
//        die();
        return $params;
    }

    private function executeStatement(PDOStatement $statement, array $params) {
        if (!$statement->execute($params)) {
            self::throwDbError($this->getDb()->errorInfo());
        }
    }

    /**
     * @return PDOStatement
     */
    private function query($sql) {
        $statement = $this->getDb()->query($sql, PDO::FETCH_ASSOC);
        if ($statement === false) {
            self::throwDbError($this->getDb()->errorInfo());
        }
        return $statement;
    }

    private static function throwDbError(array $errorInfo) {
        // BOOKING log error, send email, etc.
        throw new Exception('DB error [' . $errorInfo[0] . ', ' . $errorInfo[1] . ']: ' . $errorInfo[2]);
    }

    private static function formatDateTime(DateTime $date) {
        return $date->format(DateTime::ISO8601);
    }

}
