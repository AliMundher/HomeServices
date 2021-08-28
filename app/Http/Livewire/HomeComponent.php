<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Services;

class HomeComponent extends Component
{
    public function render()
    {
        $categories = ServiceCategory::inRandomOrder()->take(18)->get();
        $scategories = ServiceCategory::where('featured',1)->inRandomOrder()->take(8)->get();
        $services = Service::where('featured',1)->inRandomOrder()->take(8)->get();
        $sid = ServiceCategory::whereIn('slug',['ac','tv','refrigerator','geyser',
            'water-purifier'])->get()->pluck('id');
        $aservices = Service::whereIn('service_category_id',$sid)->inRandomOrder()->take(8)->get();

        return view('livewire.home-component',[
            'categories' => $categories,
            'scategories' => $scategories,
            'services' => $services,
            'aservices' => $aservices,

        ])->layout('layouts.master');
    }
}
