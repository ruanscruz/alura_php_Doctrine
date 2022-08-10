<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
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

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->phones = new ArrayCollection();
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



}