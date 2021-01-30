<?php declare(strict_types=1);

use App\Classes\Candidate;
use PHPUnit\Framework\TestCase;

class CandidateTest extends TestCase
{
    public function testConstructorWorksProperly() : void
    {
        $name = "Petras";
        $isExperienced = true;
        $candidate =  new Candidate($name, $isExperienced);

        $this->assertClassHasAttribute('name', Candidate::class);
        $this->assertClassHasAttribute('isExperienced', Candidate::class);

        $this->assertEquals($name, $candidate->getName());
        $this->assertEquals($isExperienced, $candidate->getIsExperienced());
    }
}