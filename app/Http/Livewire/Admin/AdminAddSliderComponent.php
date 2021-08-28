<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class AdminAddSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $image;
    public $status=0;

    public function updated($fields){
        $this->validateOnly($fields,[
            'title'=> 'required',
            'image'=> 'required|mimes:jpeg,png',
        ]);
    }

    public function createSlider(){
        $this->validate([
            'title'=> 'required',
            'image'=> 'required|mimes:jpeg,png',
        ]);

        $slider = new Slider();
        $slider->title = $this->title;
        $slider->status = $this->status;

        $imagename = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('slider',$imagename);
        $slider->image = $imagename;
        $slider->save();
        session()->flash('message','Slider has been Created successfully...');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-slider-component')->layout('layouts.master');
    }
}
