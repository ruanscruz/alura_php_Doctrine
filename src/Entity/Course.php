<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;

#[Entity]
class Course
{
    // propeties
    #[Id, GeneratedValue, Column]
    private int $id;

    #[ManyToMany(Student::class, mappedBy: 'courses')]
    private Collection $students;

    #[Column]
    private string $name;

    public function __construct(string $name)
    {
        $this->students = new ArrayCollection();
        $this->name = $name;
    }

    // getters
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Collection<Student>
     */
    public function getStudents(): Collection
    {
        return $this->students;
    }

    public function getName(): string
    {
        return $this->name;
    }

    // setters

    public function addStudent(Student $student) : void
    {
        if($this->students->contains($student)) return;

        $this->students->add($student);
        $student->enrollInCourse($this);
    }
}