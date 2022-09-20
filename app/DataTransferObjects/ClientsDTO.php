<?php

namespace App\DataTransferObjects;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

/**
 * Class ClientsDTO.
 */
class ClientsDTO extends DataTransferObject
{
    public string $name;
    public ?string $email;
    public string $cpf;
    
    #[MapFrom('dt_aniversario')]
    public string $birthday;
}
