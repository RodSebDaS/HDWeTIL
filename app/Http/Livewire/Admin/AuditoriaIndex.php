<?php

namespace App\Http\Livewire\Admin;

use App\Models\Audit;
use Livewire\Component;
use Termwind\Components\Dd;

class AuditoriaIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.auditoria-index');
    }
}
