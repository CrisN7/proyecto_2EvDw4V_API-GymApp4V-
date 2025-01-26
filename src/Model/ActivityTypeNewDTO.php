<?php 

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;


class ActivityTypeNewDTO
{

    public function __construct(
        #[Assert\NotBlank]
        public int $id,
        #[Assert\NotBlank]
        public string $nameActivity,
        #[Assert\NotBlank]
        public int $numberOfMonitors
    )
    {}
}

?>