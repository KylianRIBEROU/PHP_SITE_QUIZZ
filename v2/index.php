<?php
declare(strict_types=1);

use Quizz\Quizz;
use DataLoader\JsonLoader;
use DataLoader\BDLoader;

// Autoloader
require 'Classes/Autoloader/autoloader.php';
Autoloader::register();


$loader = new JsonLoader('Data/questions.json');
$loader = new BDLoader("baptiste", "baptiste", "localhost", "quizz");


$quizz = new Quizz($loader->getData());
$questions = $quizz->getQuestions();


$action = $_REQUEST['action'] ?? 'questionnaire';

ob_start();
switch ($action) {
    case 'questionnaire':
        include 'Views/questionnaire.php';
        break;
    case 'correction':
        include 'Views/correction.php';
        break;
    default:
        throw new \Exception('Action inconnue');
}
$content = ob_get_clean();

echo $content;