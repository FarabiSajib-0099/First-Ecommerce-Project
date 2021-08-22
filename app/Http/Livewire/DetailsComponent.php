<?php

namespace App\Http\Livewire;
use App\Models\Sale;
use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public $quantity;
    public function mount($slug){

        $this->slug=$slug;
        $this->quantity=1;
    }

    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,$this->quantity,$product_price)->associate('App\Models\Product');

        session()->flash('sucess_message','Item added on cart');
        return redirect()->route('product.cart');

  }

  public function increaseQunatity(){
      $this->quantity++;
  }

  public function decreaseQunatity(){
    if($this->quantity > 1){
        $this->quantity--;
    }
}

    public function render()

    {
        $product=Product::where('slug',$this->slug)->first();
        $popular_product=Product::inRandomOrder()->limit(4)->get();
        $related_product=Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        $sale=Sale::find(1);
        return view('livewire.details-component',['product'=>$product,'popular_product'=>$popular_product,'related_product'=>$related_product ,'sale'=>$sale])->layout('layouts.base');
    }
}
