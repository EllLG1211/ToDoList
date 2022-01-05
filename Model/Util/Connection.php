<?php

class Connection extends PDO
{
    private PDOStatement $stmt;

    private static Connection $instance;

    public static function getInstance() : Connection{
        global $database, $login, $passwd;
        if (!isset(self::$instance)){
            self::$instance = new Connection($database, $login, $passwd);
        }
        return self::$instance;
    }

    private function __construct(string $dsn, string $username, string $password) {
        parent::__construct($dsn,$username,$password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    /** * @param string $query
     * @param array $parameters *
     * @return bool Returns `true` on success, `false` otherwise
     */

    public function executeQuery(string $query, array $parameters = []) : bool{
        $this->stmt = parent::prepare($query);
        foreach ($parameters as $name => $value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }

        return $this->stmt->execute();
    }

    public function getResults() : array {
        return $this->stmt->fetchall();

    }
}