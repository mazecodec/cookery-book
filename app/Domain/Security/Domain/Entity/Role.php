<?php

namespace App\Domain\Security\Entity;

class Role
{
    public function __construct(
        private string $name,
        private array $permissions,
    )
    {
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
     * @return Role
     */
    public function setName(string $name): Role
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * @param array $permissions
     * @return Role
     */
    public function setPermissions(array $permissions): Role
    {
        $this->permissions = $permissions;
        return $this;
    }
}
