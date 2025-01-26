<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;


class MonitorNewDTO
{

    public function __construct(
        #[Assert\NotBlank]
        public int $id,
        #[Assert\NotBlank]
        public string $name,
        #[Assert\NotBlank]
        public string $email,
        #[Assert\NotBlank]
        public string $telephoneNumber,
        #[Assert\NotBlank]
        public string $profilePicture
    )
    {}


}


?>