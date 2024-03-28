<?php

namespace App\Infrastructure\Repositories\Feedback;

use App\Application\Services\DatabaseConnect;
use App\Domain\Feedback\Feedback;

class SqlFeedbackRepository
{
    private $connection;

    public function __construct(DatabaseConnect $databaseConnect)
    {
        $this->connection = $databaseConnect->getConnection();
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
