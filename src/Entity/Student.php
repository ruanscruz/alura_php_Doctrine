<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class Student
{
    // propeties
    #[Id]
    #[GeneratedValue]
    #[Column]
    private int $id;

    #[Column]
    private string $name;

    #[OneToMany(targetEntity: Phone::class, mappedBy: 'student', cascade: ['persist', 'remove'])]
    public Collection $phones;

    #[ManyToMany(Course::class, inversedBy: 'students')]
    private Collection $courses;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    // getters
    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    /** @return Collection<Phone> */
    public function getPhones(): Collection
    {
        return $this->phones;
    }

    /** @return Collection<Course> */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    // setters
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPhones(Phone $phone): void
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }

    public function enrollInCourse(Course $course) : void
    {
        if($this->courses->contains($course)) return;

        $this->courses->add($course);
        $course->addStudent($this);
    }

}

