<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;


class MonitorNewDTO
{

    public function __construct(
        #[Assert\NotBlank(message: "The name is mandatory!")]
        public int $id,
        #[Assert\NotBlank]
        public string $name,
        #[Assert\NotBlank]
        public string $email,
        #[Assert\NotBlank]
        public string $phone,
        #[Assert\NotBlank]
        public string $photo
    )
    {}


}


?>