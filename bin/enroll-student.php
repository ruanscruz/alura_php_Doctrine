<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Student;

use Alura\Doctrine\Helper\EntityManagerCreator as EntityManagerCreatorAlias;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreatorAlias::createEntityManager();

$student = $entityManager->find(Student::class, $argv[1]);
$course = $entityManager->find(Course::class, $argv[2]);

$student->enrollInCourse($course);

$entityManager->flush();

//php bin/enroll-student.php 1 1 || studentId = $argv[1] e courseId = $argv[2]
