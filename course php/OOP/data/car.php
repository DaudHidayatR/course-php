<?php
namespace Data;

interface car extends HasBrand
{
    function drive(): void;

    function getTire(): int;
}

interface HasBrand
{
    function getBrand(): string;
}
interface IsMaintenance
{
    function ismaintenance(): bool;
}
class Avanza implements car, IsMaintenance
{
    public function drive(): void
    {
        echo "Drive Avanza" . PHP_EOL;
    }
    public function getTire(): int
    {
        return 4;
    }
    public function getBrand(): string
    {
        return "Toyota";
    }
    public function ismaintenance(): bool
    {
        return false;
    }
}

?>