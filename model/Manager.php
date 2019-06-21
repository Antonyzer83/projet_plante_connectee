<?php

class Manager
{
    public function dbconnect() {
        /*
         * Récupération des paramètres du fichier db.ini
         * Connexion à la BDD
         */
        $params = parse_ini_file('db.ini');
        try {
            $db = new PDO($params['url'], $params['user'], $params['password']);
            return $db;
        }
        catch (PDOException $e) {
            return $e;
        }
    }

    public function beginTransaction() {
        /*
         * Début de la transaction
         */
        return $this->dbconnect()->beginTransaction();
    }

    public function commit() {
        /*
         * Validation
         */
        return $this->dbconnect()->commit();
    }

    public function rollBack() {
        /*
         * Rejet
         */
        return $this->dbconnect()->rollBack();
    }
}