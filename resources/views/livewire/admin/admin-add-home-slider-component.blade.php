<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                    <div class="row">
                        <div class="col-md-6">
                           Add new Slider
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.slider')}}" class="btn-sm btn-info pull-right">All Sliders</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('success_message'))
                    <div class="alert alert-success">{{Session::get('success_message')}}</div>
                    @endif
                     <form action="" class="form-horizontal" wire:submit.prevent="addSlider">
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Title</label>
                            <div class="col-md-4">
                                <input type="text" wire:model="title"  placeholder="Title" class="form-control input-md"/>
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Subtitle</label>
                            <div class="col-md-4">
                                <input type="text"  wire:model="subtitle" placeholder="Subtitle" class="form-control input-md"/>
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Price</label>
                            <div class="col-md-4">
                                <textarea class="form-control "  wire:model="price"  placeholder="Price"></textarea>
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label"> Link</label>
                            <div class="col-md-4">
                                <textarea class="form-control "  wire:model="link" placeholder=" Link"></textarea>
                            </div>
                         </div>

                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Image</label>
                            <div class="col-md-4">
                                <input type="file" wire:model="image"   class="input-file" class="form-control input-md"/>
                                @if($image)
                                <img src="{{$image->temporaryUrl()}}" alt="not found" width="120">
                                @endif
                            </div>
                         </div>

                         <div class="form-group">
                            <label for="" class="col-md-4 control-label"> Status</label>
                            <div class="col-md-4">
                               <select name="" id=""  wire:model="status">
                                   <option value="0">Inactive</option>
                                   <option value="1">Active</option>
                               </select>
                            </div>
                         </div>

                         <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                               <button type="submit" class=" btn btn-primary ">Add Slider</button>
                            </div>
                         </div>
                     </form>
                </div>
            </div>
        </div>
    </div>

</div>

