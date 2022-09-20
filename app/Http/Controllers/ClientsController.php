<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClientsRepository;
use App\Http\Resources\ClientsResource;
use App\DataTransferObjects\ClientsDTO;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ClientsRequest;
use App\Services\ClientsServices;


class ClientsController extends Controller
{
    private $clientsRepository, $clientsServices;

    public function __construct(
        ClientsRepository $clientsRepository,
        ClientsServices $clientsServices
    ){
        $this->clientsRepository = $clientsRepository;
        $this->clientsServices = $clientsServices;
    }

    public function get(): JsonResponse
    {
        $client = $this->clientsRepository->getById(1);
        return response()->json(new ClientsResource($client));
    }

    
    public function store(ClientsRequest $request)
    {
        $dto = new ClientsDTO($request->all());
        try{
            return $this->clientsServices->save($dto);
        }catch(Exception $e){
            return $e->message();
        }
    }
}
