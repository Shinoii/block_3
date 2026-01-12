<?php

namespace App\task2\Traits;

trait PasswordBuilder
{
    private string $hashPassword;
    public function verifyPassword(string $password, string $hash): bool
    {
        if(password_verify($password, $hash)) {
            return true;
        }
        return false;
    }
    public function hashPassword(string $password): void
    {
        $this->hashPassword = password_hash($password, PASSWORD_DEFAULT);
    }
    public function getPassword(): string
    {
        return $this->hashPassword;
    }
}