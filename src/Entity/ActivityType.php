<?php

namespace App\Entity;

use App\Repository\ActivityTypeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivityTypeRepository::class)]
class ActivityType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $activityName = null;

    #[ORM\Column]
    private ?int $numberOfMonitors = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivityName(): ?string
    {
        return $this->activityName;
    }

    public function setActivityName(string $activityName): static
    {
        $this->activityName = $activityName;

        return $this;
    }

    public function getNumberOfMonitors(): ?int
    {
        return $this->numberOfMonitors;
    }

    public function setNumberOfMonitors(int $numberOfMonitors): static
    {
        $this->numberOfMonitors = $numberOfMonitors;

        return $this;
    }
}
