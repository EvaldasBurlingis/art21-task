<?php declare(strict_types=1);

use App\Classes\Candidate;
use App\Classes\Employer;
use PHPUnit\Framework\TestCase;

require_once('./config.php');

class EmployerTest extends TestCase
{
    public function testStoresExperiencedCandidates()
    {
        $name = "Peter";
        $candidate = new Candidate("Luke", true);
        $candidate2 = new Candidate($name, true);
        $employer = new Employer;

        $employer->employ($candidate);

        $this->assertEquals(1, count($employer->getCandidates()));
        $this->assertEquals("Candidate: $name saved into storage succeessfully", $employer->employ($candidate2));
    }

    public function testDoesntStoreDublicates()
    {
        $name = "Peter";
        $candidate = new Candidate($name, true);
        $candidate2 = new Candidate($name, true);
        
        $employer = new Employer;
        $employer->employ($candidate);

        $this->assertEquals("Candidate $name is already inside storage", $employer->employ($candidate2));
    }

    public function testStoresInexperiencedCandidatesToTxtFile()
    {
        $name = "Peter";
        $candidate = new Candidate($name, false);
        
        $employer = new Employer;

        $this->assertEquals("Candidate $name saved into file candidates.txt", $employer->employ($candidate));
    }

    public function testGetCandidates()
    {
        $candidate = new Candidate("Luke", true);
        $candidate2 = new Candidate("Paul", true);
        $employer = new Employer;

        $employer->employ($candidate);
        $employer->employ($candidate2);

        $this->assertEquals(2, count($employer->getCandidates()));
    }
}