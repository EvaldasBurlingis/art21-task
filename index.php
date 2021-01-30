<?php declare(strict_types = 1);

require __DIR__ . '/vendor/autoload.php';
require_once('./config.php');

use App\Classes\Candidate;
use App\Classes\Employer;

$candidate = new Candidate('Evaldas', true);
$candidate1 = new Candidate('Zigmas', false);
$candidate2 = new Candidate('Zigmas', false);

$employer = new Employer;

$employer->employ($candidate1);
$employer->employ($candidate2);
$employer->employ($candidate3);