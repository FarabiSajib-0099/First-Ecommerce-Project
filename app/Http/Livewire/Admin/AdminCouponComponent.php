<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponComponent extends Component
{
    public function deleteCoupon($coupon_id){
              
        $coupons=Coupon::find($coupon_id);
       $coupons->delete();
       session()->flash('d_message','Your coupon has been deleted successful');
    }
    public function render()
    {
        $coupons=Coupon::all();
        return view('livewire.admin.admin-coupon-component',['coupons'=>$coupons])->layout('layouts.base');
    }
}
