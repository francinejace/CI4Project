<?php
use CodeIgniter\Test\FeatureTestTrait;
use CodeIgniter\Test\CIUnitTestCase;

class ProductsTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testIndexShowsProductList()
    {
        $result = $this->get('/products');
        $result->assertStatus(200);
        $result->assertSee('This is the product list.');
    }

    public function testDetailsShowsId()
    {
        $result = $this->get('/products/5');
        $result->assertStatus(200);
        $result->assertSee('Product details for ID: 5');
    }
}
