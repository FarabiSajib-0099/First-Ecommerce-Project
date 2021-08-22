<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                    <div class="row">
                        <div class="col-md-6">
                         Sale Setting
                        </div>

                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif
                     <form action="" class="form-horizontal" wire:submit.prevent="updateSale">
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Status</label>
                            <div class="col-md-4">
                               <select name="" id="sale-date" wire:model="status" class="form-control">
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                               </select>
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Sale Date</label>
                            <div class="col-md-4">
                                <input type="text"  id="sale_date" wire:model="sale_date" placeholder="YYY/MM/DD H:M:S" class="form-control input-md"/>
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                               <button type="submit" class=" btn btn-primary ">Update</button>
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
       $('#sale_date').datetimepicker({
            format: 'Y-MM-DD h:m:s',
       })
       .on('dp.change',function(ev){
           var data=$('#sale_date').val();
           @this.set('sale_date',data);

       });
    });
</script>

@endpush
