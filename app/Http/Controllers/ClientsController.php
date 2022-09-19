<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClientsRepository;
use App\Http\Resources\ClientsResource;
use Illuminate\Http\JsonResponse;

class ClientsController extends Controller
{
    private $clientsRepository;

    public function __construct(
        ClientsRepository $clientsRepository
    ){
        $this->clientsRepository = $clientsRepository;
    }

    public function get(): JsonResponse
    {
        $client = $this->clientsRepository->getById(1);
        return response()->json(new ClientsResource($client));
    }
}
