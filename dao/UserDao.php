<?php

class UserDao {

    /** @var PDO */
    private $db = null;

    public function __destruct() {
        // close db connection
        $this->db = null;
    }

    
    public function find($sql) {
        $result = array();
        foreach ($this->query($sql) as $row) {
            $user = new User();
            UserMapper::map($user, $row);
            $result[$user->getId()] = $user;
        }
        return $result;
    }


    public function findById($id) {
        $row = $this->query('SELECT * FROM users WHERE status != "deleted" and id = ' . (int) $id)->fetch();
        if (!$row) {
            return null;
        }
        $user = new User();
        UserMapper::map($user, $row);
        return $user;
    }


    public function save(User $user) {
        if ($user->getId() === null) {
            return $this->insert($user);
        }
        return $this->update($user);
    }


    public function delete($id) {
        $sql = '
            UPDATE users SET
                status = :status
            WHERE
                id = :id';
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, array(
            ':status' => 'deleted',
            ':id' => $id,
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

   
    private function insert(User $user) {
        $user->setId(null);
        $user->setStatus('active');
        $sql = '
            INSERT INTO users (id, first_name, last_name, email, password, status)
                VALUES (:id, :first_name, :last_name, :email, :password, :status)';
        return $this->execute($sql, $user);
    }

    /**
     * @return User
     * @throws Exception
     */
    private function update(User $user) {
        $sql = '
            UPDATE users SET
                first_name = :first_name,
                last_name = :last_name,
               email = :email,
                password = :password,
                status = :status
            WHERE
                id = :id';
        return $this->execute($sql, $user);
    }

    /**
     * @return User
     * @throws Exception
     */
    private function execute($sql, User $user) {
        $statement = $this->getDb()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($user));
        if (!$user->getId()) {
            return $this->findById($this->getDb()->lastInsertId());
        }
        return $user;
    }

    private function getParams(User $user) {
        //:id,:first_name, :last_name, :email, :status, :user_id
        $params = array(
            ':id' => $user->getId(),
            ':first_name' => $user->getFirstName(),
            ':last_name' => $user->getLastName(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
            ':status' => $user->getStatus()
        );
//        var_dump($user);
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
        // USER log error, send email, etc.
        throw new Exception('DB error [' . $errorInfo[0] . ', ' . $errorInfo[1] . ']: ' . $errorInfo[2]);
    }

//    private static function formatDateTime(DateTime $date) {
//        return $date->format(DateTime::ISO8601);
//    }

}
