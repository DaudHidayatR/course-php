<?php

namespace Daudhidayatramadhan\BelajarPhpUnitTest;

interface ProductRepository
{
    function save(Product $product): Product;

    function delete(?Product $product): void;
    function  findId(string $id): ?Product;

    function findAll(): array;
}