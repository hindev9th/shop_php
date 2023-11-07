<?php

namespace code\Entities;

class Category
{
    private int $id;
    private string $name;
    private string $created_at;
    private string $updated_at;

    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCreatedAt(): string
    {
        $time =  strtotime($this->created_at);
        return date('d-m-Y',$time);
    }

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt(): string
    {
        $time =  strtotime($this->updated_at);
        return date('d-m-Y',$time);
    }

    public function setUpdatedAt(string $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

}