<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CollegeRepository")
 */
class College
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
     * @ORM\Column(type="integer")
     */
    private $capacity;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AcademicData", mappedBy="college", orphanRemoval=true)
     */
    private $academicdatas;

    public function __construct()
    {
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
            $academicdata->setCollegeId($this);
        }

        return $this;
    }

    public function removeAcademicdata(AcademicData $academicdata): self
    {
        if ($this->academicdatas->contains($academicdata)) {
            $this->academicdatas->removeElement($academicdata);
            // set the owning side to null (unless already changed)
            if ($academicdata->getCollegeId() === $this) {
                $academicdata->setCollegeId(null);
            }
        }

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }
}
