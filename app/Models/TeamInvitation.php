<?php

namespace App\Models;

use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\TeamInvitation as JetstreamTeamInvitation;
use OwenIt\Auditing\Contracts\Auditable;

class TeamInvitation extends JetstreamTeamInvitation implements Auditable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [
        'email',
        'role',
    ];

    /**
     * Get the team that the invitation belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Jetstream::teamModel());
    }
}
