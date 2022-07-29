<?php

namespace App\models;

use Cassandra\Tinyint;

class User
{
private int $id;
private string $username;
private string $password;
private string $email;
private tinyint $role;

    /**
     * @param int $id
     * @param string $username
     * @param string $password
     * @param string $email
     *
     */
    public function __construct( int $id , string $username,string $email, string $password, tinyint $role)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return Tinyint
     */
    public function getRole(): Tinyint
    {
        return $this->role;
    }

    /**
     * @param Tinyint $role
     * @return User
     */
    public function setRole(Tinyint $role): User
    {
        $this->role = $role;
        return $this;
    }


}


