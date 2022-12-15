<?php

namespace App\Models;

use Laravel\Jetstream\Membership as JetstreamMembership;
use OwenIt\Auditing\Contracts\Auditable;

class Membership extends JetstreamMembership implements Auditable
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    use \OwenIt\Auditing\Auditable;
    public $incrementing = true;
}
