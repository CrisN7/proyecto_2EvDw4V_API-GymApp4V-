<?php

namespace App\Entity;

use App\Repository\ActivitiesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivitiesRepository::class)]
class Activities
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateTimeActivity = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ActivityType $activity_type_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTimeActivity(): ?\DateTimeInterface
    {
        return $this->dateTimeActivity;
    }

    public function setDateTimeActivity(\DateTimeInterface $dateTimeActivity): static
    {
        $this->dateTimeActivity = $dateTimeActivity;

        return $this;
    }

    public function getActivityTypeId(): ?ActivityType
    {
        return $this->activity_type_id;
    }

    public function setActivityTypeId(?ActivityType $activity_type_id): static
    {
        $this->activity_type_id = $activity_type_id;

        return $this;
    }
}
