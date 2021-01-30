<?php declare(strict_types=1);

use App\Classes\Storage;
use PHPUnit\Framework\TestCase;

class StorageTest extends TestCase
{

    private $storage;

    protected function setUp() : void
    {
        $this->storage = new Storage;
    }

    public function testGetRecords() : void
    {
        $this->storage->insert("data");

        $this->assertEquals(1, count($this->storage->getRecords()));
    }

    public function testIsRecordDublicate() : void
    {
        $name = "Petras";
        $this->storage->insert($name);

        $this->assertEquals("Candidate $name is already inside storage", $this->storage->insert($name));
    }

}