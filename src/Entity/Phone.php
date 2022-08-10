<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Phone
{
    // propeties
    #[Id, GeneratedValue, Column]
    private int $id;

    #[Column]
    private string $phone;

    #[ManyToOne(targetEntity: Student::class, inversedBy: 'phones')]
    public Student $student;

    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    // getters

    public function getId(): int
    {
        return $this->id;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    // setters
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function setStudent(Student $student): void
    {
        $this->student = $student;
    }




}