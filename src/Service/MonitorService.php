<?php

namespace App\Service;

use App\Model\MonitorNewDTO;
use App\Entity\Monitor;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Void_;

class MonitorService
{

    public function __construct(private EntityManagerInterface $entityManager)
    {

        //Con persist(), se le indica a Doctrine que debe "seguir" este objeto y prepararlo para ser insertado en la base de datos. Todavía no se ejecuta ninguna consulta en este punto.
        /*
        $this->entityManager->persist($this->DTOtoEntity($this->activityType1));
        $this->entityManager->persist($this->DTOtoEntity($this->activityType2));
        $this->entityManager->persist($this->DTOtoEntity($this->activityType3));
        $this->entityManager->persist($this->DTOtoEntity($this->activityType4));
        $this->entityManager->persist($this->DTOtoEntity($this->activityType5));*/

        //Con flush(), Doctrine ejecuta las consultas necesarias para sincronizar la base de datos con los cambios realizados. Aquí: Se inserta el nuevo restaurante en la base de datos. Se generan y ejecutan las consultas SQL necesarias.
        $this->entityManager->flush();


    }

    public function DTOtoEntity(MonitorNewDTO $monitorNewDTO): Monitor
    {
        $newMonitor = new Monitor();
        $newMonitor->setName($monitorNewDTO->name);
        $newMonitor->setEmail($monitorNewDTO->email);
        $newMonitor->setTelephoneNumber($monitorNewDTO->telephoneNumber);
        $newMonitor->setProfilePicture($monitorNewDTO->profilePicture);
        return $newMonitor;
    }

    public function addMonitor(MonitorNewDTO $monitorNewDTO): void {
        $newMonitor = new Monitor();
        $newMonitor->setName($monitorNewDTO->name);
        $newMonitor->setEmail($monitorNewDTO->email);
        $newMonitor->setTelephoneNumber($monitorNewDTO->telephoneNumber);
        $newMonitor->setProfilePicture($monitorNewDTO->profilePicture);

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