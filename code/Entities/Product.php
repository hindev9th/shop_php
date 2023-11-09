<?php
declare(strict_types=1);
namespace code\Entities;

class Product
{
    private int $id;
    private int $category_id;
    private int $brand_id;
    private string $name;
    private int $highlight;
    private ?string $description;
    private ?string $information;
    private ?string $image;
    private int $type_id;
    private string $type;
    private int $price;
    private int $price_discount;
    private int $color_id;
    private string $color_name;
    private string $color_code;
    private int $quantity;
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

    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }

    public function getBrandId(): int
    {
        return $this->brand_id;
    }

    public function setBrandId(int $brand_id): void
    {
        $this->brand_id = $brand_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getHighlight(): int
    {
        return $this->highlight;
    }

    public function setHighlight(int $highlight): void
    {
        $this->highlight = $highlight;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getInformation(): string
    {
        return $this->information;
    }

    public function setInformation(string $information): void
    {
        $this->information = $information;
    }

    public function getImage(): array
    {
        $images = explode(';',$this->image);
       return $images;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getTypeId(): int
    {
        return $this->type_id;
    }

    public function setTypeId(int $type_id): void
    {
        $this->type_id = $type_id;
    }


    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getColorId(): int
    {
        return $this->color_id;
    }

    public function setColorId(int $color_id): void
    {
        $this->color_id = $color_id;
    }

    public function getColorName(): string
    {
        return $this->color_name;
    }

    public function setColorName(string $color_name): void
    {
        $this->color_name = $color_name;
    }

    public function getColorCode(): string
    {
        return $this->color_code;
    }

    public function setColorCode(string $color_code): void
    {
        $this->color_code = $color_code;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function getPriceDiscount(): int
    {
        return $this->price_discount;
    }

    public function setPriceDiscount(int $price_discount): void
    {
        $this->price_discount = $price_discount;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
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