<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Helper\EntityManagerCreator as EntityManagerCreatorAlias;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreatorAlias::createEntityManager();

$student = new Student('Vivi');
$student->setPhones(new Phone('(31)97359-6868'));
$student->setPhones(new Phone('(31)95562-6348'));

$entityManager->persist($student);


$entityManager->flush();

//php bin/insert-student.php "Thaynara" || name = $argv[1]
