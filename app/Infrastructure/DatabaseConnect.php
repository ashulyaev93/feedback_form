<?php

namespace App\Infrastructure;

use App\Domain\Feedback\Feedback;

class DatabaseConnect
{
    private \PDO $connection;

    public function __construct()
    {
        try {
            $host = getenv('DB_HOST');
            $dbname = getenv('DB_DATABASE');
            $username = getenv('DB_USERNAME');
            $password = getenv('DB_PASSWORD');

            $this->connection = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function saveFeedback(Feedback $feedback): bool
    {
        try {
            $name = $feedback->getName();
            $phone = $feedback->getPhone();
            $message = $feedback->getMessage();

            $stmt = $this->connection->prepare("INSERT INTO feedbacks (name, phone, message) VALUES (?, ?, ?)");

            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $phone);
            $stmt->bindParam(3, $message);

            $stmt->execute();

            return true;
        } catch (\PDOException $e) {

            return false;
        }
    }
}
