<?php

namespace Daudhidayatramadhan\BelajarPhpUnitTest;

class ProductService
{
    public function __construct(private ProductRepository $repository)
    {
    }
    public function register(Product $product): Product
    {
        if($this->repository->findId($product->getId())!= null){
            throw  new \Exception("Product is already exits");
        }
        return $this->repository->save($product);
    }
    public function detele(string $id): void
    {
        $product = $this->repository->findId($id);
        if ($product == null){
            throw new \Exception('Product is Not Found');
        }
        $this->repository->delete($product);
    }
}