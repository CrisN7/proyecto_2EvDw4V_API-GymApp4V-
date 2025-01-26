<?php

namespace App\Controller;

use App\Service\ActivityTypeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;


final class ActivityTypeController extends AbstractController
{

    public function __construct(private ActivityTypeService $activityTypeService)
    {
        
    }

    #[Route('/activity-types', name: 'app_activity_type', methods: ["GET"])]
    public function getActivityTypes(): JsonResponse
    {
        return $this->json($this->activityTypeService->getAllActivityTypes());
    }
}
