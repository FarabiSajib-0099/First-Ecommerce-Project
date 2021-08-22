<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                    <div class="row">
                        <div class="col-md-6">
                           Add new Categories
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.categories')}}" class="btn-sm btn-info pull-right">All Categories</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('success_message'))
                    <div class="alert alert-suceess">{{Session::get('success_message')}}</div>
                    @endif
                     <form action="" class="form-horizontal" wire:submit.prevent="storeCategory">
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Category Name</label>
                            <div class="col-md-4">
                                <input type="text" wire:model="name" wire:keyup="generateSlug" placeholder="Category Name" class="form-control input-md"/>
                                @error('name')

                               <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Category Slug</label>
                            <div class="col-md-4">
                                <input type="text"  wire:model="slug" placeholder="Category Slug" class="form-control input-md"/>
                                @error('slug')

                               <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                               <button type="submit" class=" btn btn-primary ">Add Category</button>
                            </div>
                         </div>
                     </form>
                </div>
            </div>
        </div>
    </div>

</div>
