<?php

    namespace App\Http\Resources;

    use App\Models\Clients;
    use Illuminate\Http\Resources\Json\JsonResource;
    use App\Http\Resources\AddressesResource;

    Class ClientsResource extends JsonResource
    {
        /**
         * Transfor json response in to array
         */
        public function toArray($request): array
        {
            return [
                'id'        => $this->id,
                'name'      => $this->name,
                'email'     => $this->email,
                'cpf'       => $this->cpf,  
                'birthday'  => $this->birthday,
                'addresses' => new AddressesResource($this->address),
            ];
        }
    }
