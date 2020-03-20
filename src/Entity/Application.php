<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ApplicationRepository")
 */
class Application
{
    const STATUS = [
        0 => 'Pending',
        1 => 'Accepted',
        2 => 'Rejected'
    ];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="applications")
     */
    private $staffuser;

    /**
     * @ORM\Column(type="integer", options={"default":"0"})
     */
    private $status;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Student", mappedBy="application", cascade={"persist", "remove"})
     */
    private $student;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStaffuser(): ?User
    {
        return $this->staffuser;
    }

    public function setStaffuser(?User $staffuser): self
    {
        $this->staffuser = $staffuser;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
    public function getStatusType(): String
    {
        return self::STATUS[$this->status];
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(Student $student): self
    {
        $this->student = $student;

        // set the owning side of the relation if necessary
        if ($student->getApplication() !== $this) {
            $student->setApplication($this);
        }

        return $this;
    }
}
