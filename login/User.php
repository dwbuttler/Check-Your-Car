<?php

require_once '../database/DatabaseHelper.php';

class User
{
    protected $dbh;

    public function __construct()
    {
        $this->dbh = new DatabaseHelper();
    }

    public function registerUser(string $email, string $password): bool
    {
        // Basic validation.
        if (!isset($email) || !isset($password)) {
            return false;
        } else {
            // Sanitise user input.
            $sanitisedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
            $sanitisedPassword = filter_var($password, FILTER_SANITIZE_STRING);
            $hashedPassword = password_hash($sanitisedPassword, PASSWORD_DEFAULT);

            // User can't register if they have an account obviously.
            if ($this->checkUserExists($sanitisedEmail) === 0) {
                try {
                    return $this->dbh->insert("INSERT INTO user (email, password, created_at) VALUES ('{$sanitisedEmail}', '{$hashedPassword}', NOW())");
                } catch (PDOException $e) {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    protected function checkUserExists(string $email): int
    {
        return $this->dbh->select("SELECT id FROM user WHERE email = '{$email}'")->rowCount();
    }

    public function loginUser(string $email, string $password): bool
    {
        $identifiedUser = $this->checkUserExists($email);

        if ($identifiedUser) {
            return password_verify($password, $identifiedUser[0]['password']);
        } else {
            return false;
        }
    }
}