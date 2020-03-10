<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AcademicDataRepository")
 */
class AcademicData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\College", inversedBy="academicdatas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $college;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Module", inversedBy="academicdatas")
     */
    private $modules;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AcademicLevel", inversedBy="academicdatas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $academic_level;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Student", mappedBy="academicdata", cascade={"persist", "remove"})
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Degree")
     * @ORM\JoinColumn(nullable=false)
     */
    private $degree;

    public function __construct()
    {
        $this->modules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCollege(): ?College
    {
        return $this->college;
    }

    public function setCollege(?College $college): self
    {
        $this->college = $college;

        return $this;
    }

    /**
     * @return Collection|Module[]
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(Module $module): self
    {
        if (!$this->modules->contains($module)) {
            $this->modules[] = $module;
        }

        return $this;
    }

    public function removeModule(Module $module): self
    {
        if ($this->modules->contains($module)) {
            $this->modules->removeElement($module);
        }

        return $this;
    }

    public function getAcademicLevel(): ?AcademicLevel
    {
        return $this->academic_level;
    }

    public function setAcademicLevel(?AcademicLevel $academic_level): self
    {
        $this->academic_level = $academic_level;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(Student $student): self
    {
        $this->student = $student;

        // set the owning side of the relation if necessary
        if ($student->getAcademicdata() !== $this) {
            $student->setAcademicdata($this);
        }

        return $this;
    }

    public function getDegree(): ?Degree
    {
        return $this->degree;
    }

    public function setDegree(?Degree $degree): self
    {
        $this->degree = $degree;

        return $this;
    }
}
