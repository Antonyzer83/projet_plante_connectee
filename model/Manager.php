<?php

class Manager
{
    public function dbconnect() {
        $params = parse_ini_file('db.ini');
        try {
            $db = new PDO($params['url'], $params['user'], $params['password']);
            return $db;
        }
        catch (PDOException $e) {
            return $e;
        }
    }
}