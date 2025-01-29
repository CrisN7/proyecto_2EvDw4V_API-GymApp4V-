<?php

namespace App\Service;

use App\Entity\Activities;
use App\Entity\ActivitiesMonitors;


use App\Model\ActivitiesNewDTO;
use App\Model\ActivitiesNEWNEWDTO;
use App\Model\MonitorNewDTO;
use App\Model\ActivityTypeNewDTO;
use App\Repository\ActivitiesRepository;

use Doctrine\ORM\EntityManagerInterface;

class ActivitiesService
{
    
    public function __construct(private EntityManagerInterface $entityManager) {}

}
