<?php

namespace App\Services;
use App\Repositories\ClientsRepository;
use App\DataTransferObjects\ClientsDTO;
use DB;
/**
 * Class ClientsServices.
 */
class ClientsServices
{
    private $clientsRepository;

    public function __construct(
        ClientsRepository $clientsRepository
    ){
        $this->clientsRepository = $clientsRepository;
    }

    public function save(ClientsDTO $dto){
        DB::beginTransaction();
        try{
            $this->clientsRepository->create($dto->toArray());
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            return $e->message();
        }
    }
}
