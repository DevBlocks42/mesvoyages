<?php 

use PHPUnit\Framework\TestCase;
use App\Entity\Visite;
class VisiteTest extends TestCase 
{
    public function testGetDateCreationString()
    {
        $visite = new Visite();
        $visite->setDatecreation(new DateTime("2024-09-09"));
        $this->assertEquals("09/09/2024", $visite->getDatecreationString());
    }
}