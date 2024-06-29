<?php

namespace App\DTO;

use App\Traits\DataTransferObject;

class UserDTO
{
    use DataTransferObject;

    public string $email;
    public string $password;
    public string $username;
    public string $name;
    public string $role;

    public function __construct(array $data)
    {
        $this->fill($data);
        $this->setDefault('role', 'member');
    }
}
