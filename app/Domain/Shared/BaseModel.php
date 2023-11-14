<?php

namespace App\Domain\Shared;

use DateTime;

class BaseModel
{
    protected int $id;
    protected DateTime $createdAt;
    protected ?DateTime $updatedAt;
    protected ?DateTime $deletedAt;

    public function __construct(int $id)
    {
        $this->id = $id;
        $this->createdAt = new DateTime('Y-m-d H:i:s');
        $this->updatedAt = null;
        $this->deletedAt = null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): BaseModel
    {
        $this->id = $id;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): BaseModel
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTime $updatedAt): BaseModel
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getDeletedAt(): ?DateTime
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?DateTime $deletedAt): BaseModel
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }
}
