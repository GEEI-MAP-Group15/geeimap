<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModuleRepository")
 */
class Module
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Degree", mappedBy="modules")
     */
    private $degrees;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\AcademicData", mappedBy="modules")
     */
    private $academicdatas;

    public function __construct()
    {
        $this->degrees = new ArrayCollection();
        $this->academicdatas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Degree[]
     */
    public function getDegrees(): Collection
    {
        return $this->degrees;
    }

    public function addDegree(Degree $degree): self
    {
        if (!$this->degrees->contains($degree)) {
            $this->degrees[] = $degree;
            $degree->addModule($this);
        }

        return $this;
    }

    public function removeDegree(Degree $degree): self
    {
        if ($this->degrees->contains($degree)) {
            $this->degrees->removeElement($degree);
            $degree->removeModule($this);
        }

        return $this;
    }

    /**
     * @return Collection|AcademicData[]
     */
    public function getAcademicdatas(): Collection
    {
        return $this->academicdatas;
    }

    public function addAcademicdata(AcademicData $academicdata): self
    {
        if (!$this->academicdatas->contains($academicdata)) {
            $this->academicdatas[] = $academicdata;
            $academicdata->addModule($this);
        }

        return $this;
    }

    public function removeAcademicdata(AcademicData $academicdata): self
    {
        if ($this->academicdatas->contains($academicdata)) {
            $this->academicdatas->removeElement($academicdata);
            $academicdata->removeModule($this);
        }

        return $this;
    }
}
