<?php

namespace Daudhidayatramadhan\BelajarPhpUnitTest;

use phpDocumentor\Reflection\Types\Self_;
use PHPUnit\Framework\TestCase;

class ProductRepositoryMockTest extends TestCase
{
    private productRepository $repository;
    private ProductService $service;

    protected function setUp(): void
    {
       $this->repository = $this->createMock(ProductRepository::class);
       $this->service = new ProductService($this->repository);
    }
    public function testStub()
    {
        $product = new Product();
        $product->setId('1');
        $this->repository->method("findId")->willReturn($product);
        $result = $this->repository->findId('1');
        self::assertSame($product, $result);
    }
    public function testStubMap(){
        $product = new Product();
        $product->setId('`1');

        $product2 = new Product();
        $product2->setId('`2');

        $map = [
            ['1', $product],
            ['2', $product2],
        ];
        $this->repository->method("findId")->willReturnMap($map);
        self::assertSame($product, $this->repository->findId('1'));
        self::assertSame($product2, $this->repository->findId('2'));
    }
    public function testStubCallBack()
    {
        $this->repository->method('findId')
            ->willReturnCallback(function(string $id)
        {
            $product = new Product();
            $product->setId($id);
            return $product;
        });
        self::assertEquals('1', $this->repository->findId('1')->getId());
        self::assertEquals('2', $this->repository->findId('2')->getId());
        self::assertEquals('3', $this->repository->findId('3')->getId());
    }
    public  function testRegisterSucces()
    {
        $this->repository->method('findId')
            ->willReturn(null);
        $this->repository->method('save')->willReturnArgument(0);
        $product = new Product();
        $product->setId('1');
        $product->setName('bakso');

        $result = $this ->service->register($product);
        self::assertEquals($product->getId(), $result->getId());
        self::assertEquals($product->getName(), $result->getName());
    }
    public  function testRegisterException(){
        $this->expectException(\Exception::class);

        $productInDb = new Product();
        $productInDb->setId('1');

        $this->repository->method('findId')->willReturn($productInDb);

        $product = new Product();
        $product ->setId('1');

        $this->service->register($product);
    }

    public function  testDeleteSuccess()
    {
        $product = new Product();
        $product->setId('1');

        $this->repository->expects(self::once())
            ->method('delete')
            ->with(self::equalTo($product));

        $this->repository->expects(self::once())
            -> method('findId')
            ->willReturn($product)->
            with(self::equalTo('1'));

        $this ->service->detele('1');
        self::assertTrue(true, 'Success Delete');
    }
    public function testDeleteException()
    {
        $this->repository->expects(self::never())
            ->method('delete');
        $this->expectException(\Exception::class);
        $this->repository->expects(self::once())
        ->method('findId')
        ->willReturn(null)
        ->with(self::equalTo('1'));
        $this->service->detele('1');
    }
    public function testMock(){

        $product = new Product();
        $product->setId('1');

        $this->repository->expects(self::once())
            ->method('findId')
            ->willReturn($product);

        $result = $this->repository->findId('1');
        self::assertSame($product,$result);
    }
}