<?php

use Alura\Doctrine\Entity\Student as StudentAlias;
use Alura\Doctrine\Helper\EntityManagerCreator as EntityManagerCreatorAlias;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreatorAlias::createEntityManager();

$student = new StudentAlias('Ruan Cruz');

$entityManager->persist($student);
$entityManager->flush();


