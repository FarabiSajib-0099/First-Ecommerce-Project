<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;


class AdminCategoriesComponent extends Component
{
    use WithPagination;

    public function deleteCategories($id){
        $category=Category::find($id);
        $category->delete();
        session()->flash('message','Deleted has been successful');

    }
    public function render()

    {
        $categories=Category::paginate(10);
        return view('livewire.admin.admin-categories-component',['categories'=>$categories])->layout('layouts.base');
    }
}
