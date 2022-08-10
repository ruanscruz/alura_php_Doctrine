<?php

use Alura\Doctrine\Entity\Course;

use Alura\Doctrine\Helper\EntityManagerCreator as EntityManagerCreatorAlias;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreatorAlias::createEntityManager();

$course = new Course($argv[1]);


$entityManager->persist($course);


$entityManager->flush();

//php bin/insert-course.php "Doctrine" || name = $argv[1]
