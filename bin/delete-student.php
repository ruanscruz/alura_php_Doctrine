<?php
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator as EntityManagerCreatorAlias;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreatorAlias::createEntityManager();
$student = $entityManager->find(Student::class, $argv[1]);

$entityManager->remove($student);
$entityManager->flush();

//php bin/delete-student.php 5|| id = $argv[1]