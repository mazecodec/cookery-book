<?php

namespace App\Domain\Security\Entity;

use App\Domain\Recipe\Domain\ValueObjects\Email;

class Permission
{
    private string $name;
    private Email $email;
    private string $username;
    private string $password;
    private Role $role;
    private bool $isVerified;
    private bool $isActive;

    /**
     * @param string $name
     * @param Email $email
     * @param string $password
     * @param Role $role
     */
    public function __construct(string $name, Email $email, string $password, Role $role)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): Permission
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @param Email $email
     * @return User
     */
    public function setEmail(Email $email): Permission
    {
        $this->email = $email;
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
    public function setUsername(string $username): Permission
    {
        $this->username = $username;
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
    public function setPassword(string $password): Permission
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return Role
     */
    public function getRole(): Role
    {
        return $this->role;
    }

    /**
     * @param Role $role
     * @return User
     */
    public function setRole(Role $role): Permission
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return bool
     */
    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    /**
     * @param bool $isVerified
     * @return User
     */
    public function setIsVerified(bool $isVerified): Permission
    {
        $this->isVerified = $isVerified;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     * @return User
     */
    public function setIsActive(bool $isActive): Permission
    {
        $this->isActive = $isActive;
        return $this;
    }

}
