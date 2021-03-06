<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class AdminAddServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;

    // Generate Slug Fun
    public function generateSlug(){
        $this->slug=Str::slug($this->name,'-');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'image' =>'required|mimes:jpeg,png'
        ]);
    }

    public function createCategory(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' =>'required|mimes:jpeg,png'
        ]);
        $category = new ServiceCategory();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('categories',$imageName);
        $category->image=$imageName;
        $category->save();
        session()->flash('message','Category has been Created successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-service-category-component')->layout('layouts.master');
    }
}
