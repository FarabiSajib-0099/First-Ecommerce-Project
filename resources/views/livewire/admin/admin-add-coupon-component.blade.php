<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                    <div class="row">
                        <div class="col-md-6">
                           Add new Coupon
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.coupon')}}" class="btn-sm btn-info pull-right">All Coupon</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif
                     <form action="" class="form-horizontal" wire:submit.prevent="storeCoupon">
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Coupon Code </label>
                            <div class="col-md-4">
                                <input type="text" wire:model="code"  placeholder="Coupon Code " class="form-control input-md"/>
                                @error('code')

                               <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Coupon Type</label>
                            <div class="col-md-4">
                                <select name="" id="" class="form-control" wire:model="type">
                                    <option value="">Select Type</option>
                                    <option value="fixed">Fixed</option>
                                    <option value="percent">Percent</option>
                                </select>
                                @error('type')

                               <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                         </div>

                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Coupon Value </label>
                            <div class="col-md-4">
                                <input type="text" wire:model="value"  placeholder="Coupon Value " class="form-control input-md"/>
                                @error('value')

                               <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Cart Value </label>
                            <div class="col-md-4">
                                <input type="text" wire:model="cart_value"  placeholder="Cart Value " class="form-control input-md"/>
                                @error('cart_value')

                               <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                         </div>

                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Coupon Expiry Date </label>
                            <div class="col-md-4" wire:ignore>
                                <input type="text" id="expiry_date" wire:model="expiry_date"  placeholder="YY/MM/DD h:m:s " class="form-control input-md"/>
                                @error('expiry_date')

                               <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                               <button type="submit" class=" btn btn-primary ">Add Coupon</button>
                            </div>
                         </div>
                     </form>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
<script>
      $(function(){
       $('#expiry_date').datetimepicker({
            format: 'Y-MM-DD h:m:s',
       })
       .on('dp.change',function(ev){
           var data=$('#expiry_date').val();
           @this.set('expiry_date',data);

       });
    });
</script>

@endpush