<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BackgroundRepository")
 */
class Background
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
    private $previous_university;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $previous_city;


    const SECURITY_REASON = [
        0 => 'Change of house',
        1 => 'University no longer provides courses'
        2 => 'Unable to go to university'
    ];
    /**
     * @ORM\Column(type="integer", options={"default":"0"})
     */
    private $security_reason;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_validated;


    const PERIOD_TYPE = [
        0 => 'Semester',
        1 => 'Year'
    ];
    /**
     * @ORM\Column(type="integer", options={"default":"0"})
     */
    private $period_type;

    /**
     * @ORM\Column(type="integer")
     */
    private $period_value;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Student", mappedBy="background", cascade={"persist", "remove"})
     */
    private $student;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPreviousUniversity(): ?string
    {
        return $this->previous_university;
    }

    public function setPreviousUniversity(string $previous_university): self
    {
        $this->previous_university = $previous_university;

        return $this;
    }

    public function getPreviousCity(): ?string
    {
        return $this->previous_city;
    }

    public function setPreviousCity(string $previous_city): self
    {
        $this->previous_city = $previous_city;

        return $this;
    }

    public function getSecurityReason(): ?string
    {
        return $this->security_reason;
    }

    public function setSecurityReason(string $security_reason): self
    {
        $this->security_reason = $security_reason;

        return $this;
    }

    public function getSecurityReasonType(): String
    {
        return self::SECURITY_REASON[$this->security_reason];
    }

    public function getIsValidated(): ?bool
    {
        return $this->is_validated;
    }

    public function setIsValidated(bool $is_validated): self
    {
        $this->is_validated = $is_validated;

        return $this;
    }

    public function getPeriodType(): ?string
    {
        return $this->period_type;
    }

    public function setPeriodType(string $period_type): self
    {
        $this->period_type = $period_type;

        return $this;
    }
    public function getPeriodTypeType(): String
    {
        return self::PERIOD_TYPE[$this->period_type];
    }

    public function getPeriodValue(): ?int
    {
        return $this->period_value;
    }

    public function setPeriodValue(int $period_value): self
    {
        $this->period_value = $period_value;

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
        if ($student->getBackground() !== $this) {
            $student->setBackground($this);
        }

        return $this;
    }
}
