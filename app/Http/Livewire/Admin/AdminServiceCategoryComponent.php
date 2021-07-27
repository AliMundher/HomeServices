<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServiceCategoryComponent extends Component
{

    public function removeCategory($id){
        $category = ServiceCategory::find($id);
        if($category->image){
            unlink('images/categories'.'/'.$category->image);
        }
        $category->delete();
        session()->flash('message','Category has been Deleted successfully');
    }

    use WithPagination;
    public function render()
    {
        $scategories = ServiceCategory::paginate(10);
        return view('livewire.admin.admin-service-category-component',
        ['scategories'=>$scategories])->layout('layouts.master');
    }
}
