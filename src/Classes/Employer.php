<?php declare(strict_types=1);

namespace App\Classes;

use App\Classes\Storage;
use App\Classes\Candidate;

class Employer
{
    private Storage $storage;

    public function __construct()
    {
        $this->storage = new Storage;
    }


    public function employ(Candidate $candidate) : String {
        
        if ($candidate->getIsExperienced()) return $this->storage->insert($candidate->getName());

        return $this->storage->insertToFile($candidate->getName());
    }

    public function getCandidates() : Array
    {
        return $this->storage->getRecords();
    }
}
