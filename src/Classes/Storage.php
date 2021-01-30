<?php declare(strict_types=1);

namespace App\Classes;

class Storage
{
    private Array $records = [];

    public function insert(String $name) : String
    {
        if ($this->isRecordDublicate($name, $this->records))  return "Candidate $name is already inside storage";
        $this->insertToStorage($name);

        return "Candidate: $name saved into storage succeessfully";        
    }

    public function getRecords() : Array
    {
        return $this->records;
    }

    private function isRecordDublicate(String $key, Array $array) : Bool
    {
        return in_array($key, $array, true);
    }

    private function insertToStorage(String $name) : void
    {
        array_push($this->records, $name);
    }

    public function insertToFile(String $name) : String
    {   
        if (file_exists(ROOT . '/candidates.txt')) {
            $candidates_from_file = explode("\n", file_get_contents(ROOT . '/candidates.txt'));

            if ($this->isRecordDublicate($name, $candidates_from_file)) return "Candidate $name is already in the list";

            file_put_contents(ROOT . '/candidates.txt', $name . PHP_EOL, FILE_APPEND);
        } else {
            file_put_contents(ROOT . '/candidates.txt', $name . PHP_EOL);
        }
    
        return "Candidate $name saved into file candidates.txt";
    }
}