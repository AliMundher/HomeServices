<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service;

class AdminServiceComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $service = Service::paginate(10);
        return view('livewire.admin.admin-service-component',
        ['services'=>$service])->layout('layouts.master');
    }
}
