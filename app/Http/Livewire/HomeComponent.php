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
        return view('livewire.home-component',[
            'categories' => $categories,
            'scategories' => $scategories,
            'services' => $services
        ])->layout('layouts.master');
    }
}
