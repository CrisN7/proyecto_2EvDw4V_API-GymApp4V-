<?php

namespace App\Service;

use App\Model\ActivityTypeNewDTO;
use App\Entity\ActivityType;
use Doctrine\ORM\EntityManagerInterface;


class ActivityTypeService
{
    public ActivityTypeNewDTO $activityType1;
    public ActivityTypeNewDTO $activityType2;
    public ActivityTypeNewDTO $activityType3;
    public ActivityTypeNewDTO $activityType4;
    public ActivityTypeNewDTO $activityType5;


    public function __construct(private EntityManagerInterface $entityManager)
    {
        $this->activityType1 = new ActivityTypeNewDTO(1, "Pilates", 1);
        $this->activityType2 = new ActivityTypeNewDTO(2, "Spinning", 1);
        $this->activityType3 = new ActivityTypeNewDTO(3, "BodyPump", 2);
        $this->activityType4 = new ActivityTypeNewDTO(4, "Yoga", 2);
        $this->activityType5 = new ActivityTypeNewDTO(5, "Mindfullness", 2);

        $this->emptyActivityTypeTable();
        
        //Con persist(), se le indica a Doctrine que debe "seguir" este objeto y prepararlo para ser insertado en la base de datos. Todavía no se ejecuta ninguna consulta en este punto.
        $this->entityManager->persist($this->DTOtoEntity($this->activityType1));
        $this->entityManager->persist($this->DTOtoEntity($this->activityType2));
        $this->entityManager->persist($this->DTOtoEntity($this->activityType3));
        $this->entityManager->persist($this->DTOtoEntity($this->activityType4));
        $this->entityManager->persist($this->DTOtoEntity($this->activityType5));

        //Con flush(), Doctrine ejecuta las consultas necesarias para sincronizar la base de datos con los cambios realizados. Aquí: Se inserta el nuevo restaurante en la base de datos. Se generan y ejecutan las consultas SQL necesarias.
        $this->entityManager->flush();


    }

    public function emptyActivityTypeTable(): void
    {
        // Recuperar todos los registros de la tabla ActivityType
        $activityTypes = $this->entityManager->getRepository(ActivityType::class)->findAll();

        // Eliminar cada registro
        foreach ($activityTypes as $activityType) {
            $this->entityManager->remove($activityType);
        }

        // Aplicar los cambios a la base de datos
        $this->entityManager->flush();
    }

    public function DTOtoEntity(ActivityTypeNewDTO $activityTypeDTO): ActivityType
    {
        $activityType = new ActivityType();
        $activityType->setActivityName($activityTypeDTO->nameActivity);
        $activityType->setNumberOfMonitors($activityTypeDTO->numberOfMonitors);
        return $activityType;
    }

    public function getAllActivityTypes(): array
    {
        return $this->entityManager->getRepository(ActivityType::class)->findAll();
    }

}

?>