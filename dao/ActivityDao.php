<?php

class ActivityDao {

    /** @var PDO */
    private $db = null;

    public function __destruct() {
        // close db connection
        $this->db = null;
    }

    public function find($sql) {
        $result = array();
        foreach ($this->query($sql) as $row) {
            $activity = new Activity();
            ActivityMapper::map($activity, $row);
            $result[$activity->getActivityId()] = $activity;
        }
        return $result;
    }

    public function findById($id) {
        $row = $this->query('SELECT * FROM activities WHERE status != "deleted" and activity_id = ' . (int) $id)->fetch();
    
        if (!$row) {
            return null;
        }
        $activity = new Activity();
        ActivityMapper::map($activity, $row);
        return $activity;
    }

    public function save(Activity $activity) {
        if ($activity->getActivityId() === null) {
            return $this->insert($activity);
        }
        return $this->update($activity);
    }

    public function delete($id) {
        $sql = '
            UPDATE activities SET
                status = :status
            WHERE
                activity_id = :activity_id';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            ':status' => 'deleted',
            ':activity_id' => $id,
        ));
        return $statement->rowCount() == 1;
    }

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

//  @return Activity
// @throws Exception

    private function insert(Activity $activity) {
        $activity->setActivityId(null);
        $activity->setStatus('active');
        $sql = '
              INSERT INTO activities (activity_id, name, description, user_id, status)
                VALUES (:activity_id, :name, :description, :user_id, :status)';
        return $this->execute($sql, $activity);
    }

    /**
     * @return Activity
     * @throws Exception
     */
    private function update(Activity $activity) {
        $sql = '
            UPDATE activities SET
                name = :name,
                description = :description,
                user_id = :user_id,
                status = :status
            WHERE
                activity_id = :activity_id';
        return $this->execute($sql, $activity);
    }

    /**
     * @return Activity
     * @throws Exception
     */
    private function execute($sql, Activity $activity) {
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($activity));
        if (!$activity->getActivityId()) {
            return $this->findById($this->getDb()->lastInsertId());
        }
        return $activity;
    }

    private function getParams(Activity $activity) {
        $params = array(
            ':activity_id' => $activity->getActivityId(),
            ':name' => $activity->getName(),
            ':description' => $activity->getDescription(),
            ':user_id' => $activity->getUserId(),
            ':status' => $activity->getStatus(),
        );
//        var_dump($activity);
//        echo '<br><br>';
//         var_dump($params);die();
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
        // ACTIVITY log error, send email, etc.
        throw new Exception('DB error [' . $errorInfo[0] . ', ' . $errorInfo[1] . ']: ' . $errorInfo[2]);
    }

}
