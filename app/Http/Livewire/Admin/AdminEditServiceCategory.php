<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Str;
use Livewire\Component;
use App\models\ServiceCategory;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class AdminEditServiceCategory extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $newimage;
    public $category_id;

    public function updated($fields){
        $this->validateOnly($fields,[
            "name" => "required",
            "slug" => "required",
        ]);

        if($this->newimage){
            $this->validateOnly($fields,[
                "newimage" => "required|mimes:jpeg,png,jpg"
            ]);
        }
    }

    public function mount($category_id){
        $category = ServiceCategory::find($category_id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->image = $category->image;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name,'-');
    }

    public function updateCategory(){
        $this->validate([
            "name" => "required",
            "slug" => "required",
        ]);
        if($this->newimage){
            $this->validate([
                "newimage" => "required|mimes:jpeg,png,jpg"
            ]);
        }

        $scategory = ServiceCategory::find($this->category_id);
        $scategory->name = $this->name;
        $scategory->slug = $this->slug;
        if ($this->newimage){
            $imageNam = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('categories',$imageNam);
            $scategory->image = $imageNam;
        }
        $scategory->save();
        session()->flash('message','Category has been Updated successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-service-category')->layout('layouts.master');
    }
}
