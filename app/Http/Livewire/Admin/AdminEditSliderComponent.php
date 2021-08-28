<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use  Livewire\WithFileUploads;

class AdminEditSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $image;
    public $status;

    public $newImage;
    public $slideId;

    public function mount($slide_id){
        $slide = Slider::find($slide_id);
        $this->slideId = $slide->id;
        $this->title = $slide->title;
        $this->image = $slide->image;
        $this->status = $slide->status;
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'title' => 'required',
        ]);

        if($this->newImage){
            $this->validateOnly($fields,[
                'newImage' => 'required|mimes:jpeg,png',
            ]);
        }
    }

    public function updateSlider(){
        $this->validate([
            'title'=> 'required',
        ]);

        if($this->newImage){
            $this->validate([
                'newImage' => 'required|mimes:jpeg,png',
            ]);
        }

        $slider = Slider::find($this->slideId);
        $slider->title = $this->title;
        $slider->status = $this->status;
        if($this->newImage){
            unlink('images/slider/'.$slider->image);
            $imagename = Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('slider',$imagename);
            $slider->image = $imagename;
        }

        $slider->save();
        session()->flash('message','Slider has been Updated successfully...');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-slider-component')->layout('layouts.master');
    }
}
