<?php
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator as EntityManagerCreatorAlias;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreatorAlias::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    echo "ID: {$student->id()} Name: {$student->name()}" . PHP_EOL;
}

$studentById = $studentRepository->find(3);
echo "O aluno de ID: {$studentById->id()} é o {$studentById->name()}" . PHP_EOL;

$studentBy = $studentRepository->findBy(['name' => 'Bruna']);
foreach ($studentBy as $student){
    echo '-- BY --' . PHP_EOL;
    echo "ID: {$student->id()} Name: {$student->name()}" . PHP_EOL;
}

//php bin/update-student.php 3