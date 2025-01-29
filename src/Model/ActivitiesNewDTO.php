<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;
use DateTime;

class ActivitiesNewDTO
{
    public function __construct(
        public int $id,
        public DateTime $date,
        public int $duration,
        public ActivityTypeNewDTO $activityType,
        public array $activityMonitors
    ) {}
}
