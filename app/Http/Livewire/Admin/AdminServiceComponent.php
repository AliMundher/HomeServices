<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service;

class AdminServiceComponent extends Component
{
    use WithPagination;

    public function deleteService($service_id){
        $service = Service::find($service_id);

        if($service->thumbnail){
            unlink("images/services/thumbnails"."/".$service->thumbnail);
        }
        if($service->image){
            unlink("images/services"."/".$service->image);
        }
        $service->delete();
        session()->flash("message", "Service deleted successfully");

    }

    public function render()
    {
        $service = Service::paginate(10);
        return view('livewire.admin.admin-service-component',
        ['services'=>$service])->layout('layouts.master');
    }
}
