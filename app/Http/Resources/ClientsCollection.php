<?php

    namespace App\Http\Resources;

    use App\Models\Clients;
    use Illuminate\Http\Resources\Json\ResourceCollection;

    Class ClientsCollection extends ResourceCollection
    {
        /**
         * Transfor request in to array
         */
        public function toArray($request)
        {
            return parent::toArray($request);
        }
    }
