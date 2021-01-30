<?php declare(strict_types=1);

namespace App\Classes;

class Candidate
{
    public function __construct(
        private String $name,
        private Bool $isExperienced,
    ) {}

    public function getName() : String
    {
        return $this->name;
    }

    public function getIsExperienced() : Bool
    {
        return $this->isExperienced;
    }    
}
