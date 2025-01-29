<?php

namespace App\Controller;

use App\Service\ActivitiesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



final class ActivitiesController extends AbstractController
{
    public function __construct(private ActivitiesService $activityService) {}

    
}
