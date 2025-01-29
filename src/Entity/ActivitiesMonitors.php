<?php

namespace App\Entity;

use App\Repository\ActivitiesMonitorsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivitiesMonitorsRepository::class)]
class ActivitiesMonitors
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Activities $activity_id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Monitor $monitor_id = null;

    #[ORM\ManyToOne(inversedBy: 'activityMonitors')]
    private ?Activities $activities = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivityId(): ?Activities
    {
        return $this->activity_id;
    }

    public function setActivityId(?Activities $activity_id): static
    {
        $this->activity_id = $activity_id;

        return $this;
    }

    public function getMonitorId(): ?Monitor
    {
        return $this->monitor_id;
    }

    public function setMonitorId(?Monitor $monitor_id): static
    {
        $this->monitor_id = $monitor_id;

        return $this;
    }

    public function getActivities(): ?Activities
    {
        return $this->activities;
    }

    public function setActivities(?Activities $activities): static
    {
        $this->activities = $activities;

        return $this;
    }

}
