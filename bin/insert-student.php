<?php

use Alura\Doctrine\Entity\Student as StudentAlias;
use Alura\Doctrine\Helper\EntityManagerCreator as EntityManagerCreatorAlias;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreatorAlias::createEntityManager();

$student = new StudentAlias($argv[1]);

$entityManager->persist($student);
$entityManager->flush();

//php bin/insert-student.php "Thaynara" || name = $argv[1]
