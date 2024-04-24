<?php 

// namespace Shipmate\Test;

use Shipmate\Shipment;
use PHPUnit\Framework\TestCase as PhpUnitTestCase;

class ShipmateTest extends PhpUnitTestCase
{
    public function testOne(): void
    {
        $shipment = new Shipment();
        $a = true;
        $shipment->setShipmentReference("67897");
        die(print_r($shipment, true));
    }
}