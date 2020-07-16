<?php

class Database {

    private $dbh;
    private $stmt;
    private $error;

    public function __construct() {
        // Set DSN
        $dsn = 'mysql:host=' . Config::get('db_host') . ';dbname=' . Config::get('db_name');
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        // Create PDO instance
        try {
            $this->dbh = new PDO($dsn, Config::get('db_user'), Config::get('db_password'), $options);
        } catch (PDOexeption $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * Prepare statement with query.
     */
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    /**
     * Bind values.
     */
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * Execute the prepared statement.
     */
    public function execute()
    {
        return $this->stmt->execute();
    }

    /**
     * Get result set as array of objects.
     *
     * @return mixed
     */
    public function result()
    {
        $this->execute();

        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get single record as object.
     *
     * @return mixed
     */
    public function row()
    {
        $this->execute();

        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Get row count.
     *
     * @return mixed
     */
    public function count()
    {
        return $this->stmt->rowCount();
    }
}
