<?php

    namespace App\Http\Resources;

    use App\Models\Clients;
    use Illuminate\Http\Resources\Json\JsonResource;

    Class ClientsResource extends JsonResource
    {
        /**
         * Transfor json response in to array
         */
        public function toArray($request): array
        {
            return [
                'name'      => $this->name,
                'email'     => $this->email,
                'cpf'       => $this->cpf,
                'birthday'  => $this->birthday
            ];
        }
    }
