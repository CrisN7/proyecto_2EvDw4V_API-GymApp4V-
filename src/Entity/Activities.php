<?php

namespace App\Entity;

use App\Repository\ActivitiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(nullable: true)]
    private ?int $duration = null;

    /**
     * @var Collection<int, ActivitiesMonitors>
     */
    #[ORM\OneToMany(targetEntity: ActivitiesMonitors::class, mappedBy: 'activities')]
    private Collection $activityMonitors;

    public function __construct()
    {
        $this->activityMonitors = new ArrayCollection();
    }

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

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return Collection<int, ActivitiesMonitors>
     */
    public function getActivityMonitors(): Collection
    {
        return $this->activityMonitors;
    }

    public function addActivityMonitor(ActivitiesMonitors $activityMonitor): static
    {
        if (!$this->activityMonitors->contains($activityMonitor)) {
            $this->activityMonitors->add($activityMonitor);
            $activityMonitor->setActivities($this);
        }

        return $this;
    }

    public function removeActivityMonitor(ActivitiesMonitors $activityMonitor): static
    {
        if ($this->activityMonitors->removeElement($activityMonitor)) {
            // set the owning side to null (unless already changed)
            if ($activityMonitor->getActivities() === $this) {
                $activityMonitor->setActivities(null);
            }
        }

        return $this;
    }
}
