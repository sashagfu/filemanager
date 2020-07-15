<?php

class Model
{
    private $db;

    protected $table;
    protected $columns;
    protected $binds;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Get all records.
     *
     * @return mixed
     */
    public function all()
    {
        $this->db->query("SELECT * FROM `" . $this->table . "`");

        return $this->db->result();
    }

    /**
     * Get one record.
     *
     * @param string $column
     * @param string $value
     *
     * @return mixed
     */
    public function get($column, $value)
    {
        $sql = "SELECT * FROM `" . $this->table . "` WHERE `" . $column . "` = '" . $value . "'";

        $this->db->query($sql);

        return $this->db->row();
    }

    /**
     * Create record.
     *
     * @param $data
     * @return bool
     */
    public function insert($data)
    {
        $columns = '';
        foreach ($this->columns as $val) {
            $columns .= $val;
            if (next($this->columns )) {
                $columns .= ',';
            }
        }

        $binds = '';
        foreach ($this->columns as $val) {
            $binds .= ':' . $val;
            if (next($this->columns )) {
                $binds .= ',';
            }
        }

        $this->db->query("INSERT INTO `" . $this->table . "` (" . $columns . ") VALUES (" . $binds . ")");

        foreach ($this->columns as $val) {
            $this->db->bind(':' . $val, $data[$val]);
        }

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Update record.
     *
     * @param array $data
     * @param array $where
     * @return bool
     */
    public function update($data, $where)
    {
        $columns = '';
        foreach ($data as $key => $val) {
            $columns .= ' ' . $key . ' = :' . $key;
            if (next($data)) {
                $columns .= ',';
            }
        }

        $conditions = '';
        foreach ($where as $key => $val) {
            $conditions .= ' ' . $key . ' = :' . $key;
            if (next($where)) {
                $conditions .= ',';
            }
        }

        $this->db->query("UPDATE `" . $this->table . "` SET " . $columns . " WHERE " . $conditions);

        foreach ($data as $key => $val) {
            $this->db->bind(':' . $key, $val);
        }

        foreach ($where as $key => $val) {
            $this->db->bind(':' . $key, $val);
        }

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
