<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithPagination;

class AdminSliderComponent extends Component
{
    use WithPagination;

    public function deleteSlider($id){
        $slider = Slider::find( $id);
        unlink('images/slider/'.$slider->image);
        $slider->delete();
        session()->flash('message', 'Slider deleted successfully...');
    }

    public function render()
    {
        $slides = Slider::paginate(10);
        return view('livewire.admin.admin-slider-component',[
            'slides' => $slides,
        ])->layout('layouts.master');
    }
}
