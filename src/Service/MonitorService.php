<?php

namespace App\Service;

use App\Model\MonitorNewDTO;
use App\Entity\Monitor;
use Doctrine\ORM\EntityManagerInterface;

class MonitorService
{

    public function __construct(private EntityManagerInterface $entityManager)
    {

    }

    public function DTOtoEntity(MonitorNewDTO $monitorNewDTO): Monitor
    {
        $newMonitor = new Monitor();
        $newMonitor->setName($monitorNewDTO->name);
        $newMonitor->setEmail($monitorNewDTO->email);
        $newMonitor->setTelephoneNumber($monitorNewDTO->phone);
        $newMonitor->setProfilePicture($monitorNewDTO->photo);
        return $newMonitor;
    }

    public function addMonitor(MonitorNewDTO $monitorNewDTO): void {
        $newMonitor = new Monitor();
        $newMonitor->setName($monitorNewDTO->name);
        $newMonitor->setEmail($monitorNewDTO->email);
        $newMonitor->setTelephoneNumber($monitorNewDTO->phone);
        $newMonitor->setProfilePicture($monitorNewDTO->photo);

        $this->entityManager->persist($newMonitor);
        $this->entityManager->flush();
    }

    public function getAllMonitors(): array
    {
        return $this->entityManager->getRepository(Monitor::class)->findAll();
    }

    public function getMonitorById(int $monitorId): Monitor
    {
        return $this->entityManager->getRepository(Monitor::class)->find($monitorId);
    }

    public function deleteMonitorById(int $monitorId): void
    {
        $monitor = $this->entityManager->getRepository(Monitor::class)->find($monitorId);
        $this->entityManager->remove($monitor);
        $this->entityManager->flush();
    }

    public function existMonitorById($monitorId): bool
    {
        return $this->entityManager->getRepository(Monitor::class)->find($monitorId) != null;
    }
}

?>