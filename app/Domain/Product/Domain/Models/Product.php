<?php

namespace App\Domain\Recipe\Domain\Models;

use DateTime;

class Product
{
    private int $id;
    private string $nombre;
    private string $imagen;
    private DateTime $created_at;
    private ?DateTime $updated_at;
}
