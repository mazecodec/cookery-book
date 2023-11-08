<?php

namespace App\Domain\User\Domain;

class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $avatar;

    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $avatar
     */
    public function __construct(
        int $id,
        string $name,
        string $email,
        string $password,
        string $avatar)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->avatar = $avatar;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): User
    {
        $this->avatar = $avatar;
        return $this;
    }
}
