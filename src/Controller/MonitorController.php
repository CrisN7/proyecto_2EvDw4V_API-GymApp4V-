<?php

namespace App\Controller;

use App\Service\MonitorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Model\MonitorNewDTO;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;


final class MonitorController extends AbstractController
{

    public function __construct(private MonitorService $monitorService)
    {
        
    }

    #[Route('/monitors', name: 'get_all_monitors', methods: ["GET"])]
    public function getMonitors(): JsonResponse
    {
        return $this->json($this->monitorService->getAllMonitors());
    }


    #[Route('/monitors', name: 'add_monitor', methods: ["POST"], format: "json")]
    public function newMonitor(#[MapRequestPayload(acceptFormat: 'json', validationFailedStatusCode: Response::HTTP_NOT_FOUND)] MonitorNewDTO $monitorNewDTO): JsonResponse
    {
        $this->monitorService->addMonitor($monitorNewDTO);

        return $this->json($monitorNewDTO);
    }


    //TODO no se si es obligatorio pasarle un body como lo especifica en el swagger. Tenemos que hacer que los errores que devuelva sean como los de los ejemplos?? ej:{"code": 21,"description": "The name is mandatory"}
    #[Route('/monitors/{monitorId}', name: 'edit_monitor', methods: ["PUT"])]
    public function editMonitor(int $monitorId): JsonResponse
    {
        if ($this->monitorService->existMonitorById($monitorId)){
            return $this->json($this->monitorService->getMonitorById($monitorId));
        }
        else{
            return $this->json(["error" => "No existe un monitor con ID: ". $monitorId], 400);
        }
    }


    #[Route('/monitors/{monitorId}', name: 'delete_monitor', methods: ["DELETE"])]
    public function deleteMonitor(int $monitorId): JsonResponse
    {
        if ($this->monitorService->existMonitorById($monitorId)){ 
            $this->monitorService->deleteMonitorById($monitorId);
            return $this->json(["Monitor eliminado con éxito"], 200);
        }
        else{
            return $this->json(["error" => "Monitor not found."], 404);
        }
    }
}
