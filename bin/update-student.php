<?php
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator as EntityManagerCreatorAlias;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreatorAlias::createEntityManager();

$student = $entityManager->getReference(Student::class, $argv[1]);
$student->setName($argv[2]);

$entityManager->flush();

//php bin/update-student.php 3 "Thaynara" || id = $argv[1] e name = $argv[2]