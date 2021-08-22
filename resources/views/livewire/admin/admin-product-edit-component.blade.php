<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">

                    <div class="row">
                        <div class="col-md-6">
                         Edit Product
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.products')}}" class="btn-sm btn-info pull-right">All Products</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    @if(Session::has('success_message'))
                    <div class="alert alert-success">{{Session::get('success_message')}}</div>
                    @endif
                     <form action="" class="form-horizontal" wire:submit.prevent="updateProduct">
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Product Name</label>
                            <div class="col-md-4">
                                <input type="text" wire:model="name" wire:keyup="generateSlug" placeholder="Product Name" class="form-control input-md"/>
                                @error('name')

                               <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Product Slug</label>
                            <div class="col-md-4">
                                <input type="text"  wire:model="slug" placeholder="Product Slug" class="form-control input-md"/>
                                @error('slug')

                               <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Short Description</label>
                            <div class="col-md-4" wire:ignore>
                                <textarea class="form-control " id="short_description"  wire:model="short_description"  placeholder="Short Description"></textarea>
                                @error('short_description')

                                <p class="text-danger">{{$message}}</p>
                                 @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label"> Description</label>
                            <div class="col-md-4" wire:ignore>
                                <textarea class="form-control " id="description"  wire:model="description" placeholder=" Description"></textarea>
                                @error('description')

                                <p class="text-danger">{{$message}}</p>
                                 @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Regular Price</label>
                            <div class="col-md-4">
                                <input type="text"  wire:model="regular_price" placeholder="Regular Price" class="form-control input-md"/>
                                @error('regular_price')

                                <p class="text-danger">{{$message}}</p>
                                 @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Sale Price</label>
                            <div class="col-md-4">
                                <input type="text"  wire:model="sale_price" placeholder="Sale Price" class="form-control input-md"/>
                                @error('sale_price')

                                <p class="text-danger">{{$message}}</p>
                                 @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">SKU</label>
                            <div class="col-md-4">
                                <input type="text"  wire:model="SKU" placeholder="SKU" class="form-control input-md"/>
                                @error('SKU')

                                <p class="text-danger">{{$message}}</p>
                                 @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Stock</label>
                            <div class="col-md-4">
                               <select name="" id="" class="form-control"  wire:model="stock_status">
                                   <option value="instock">Instock</option>
                                   <option value="outofstock">Out Of Stock</option>
                               </select>
                               @error('stock_status')

                               <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Featured</label>
                            <div class="col-md-4">
                               <select name="" id="" class="form-control" wire:model="featured" >
                                   <option value="0">Yes</option>
                                   <option value="1">No</option>
                               </select>
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Quantity</label>
                            <div class="col-md-4">
                                <input type="text"  wire:model="quantity" placeholder="Quantity" class="form-control input-md"/>
                                @error('quantity')

                                <p class="text-danger">{{$message}}</p>
                                 @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Product Image</label>
                            <div class="col-md-4">
                                <input type="file" wire:model="newimage"   class="input-file" class="form-control input-md"/>
                                @if($newimage)
                                <img src="{{$newimage->temporaryUrl()}}" alt="not found" width="120">
                                @else
                                <img src="{{asset('frontend')}}/assets/images/products/{{$image}}" width="120"  alt="">
                                @endif
                                @error('image')

                                <p class="text-danger">{{$message}}</p>
                                 @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label">Category</label>
                            <div class="col-md-4">
                               <select name="" id="" class="form-control" wire:model="category_id">
                                   @foreach ($categories as $category)
                                   <option value="{{$category->id}}">{{$category->name}}</option>
                                   @endforeach


                               </select>
                               @error('category_id')

                               <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="" class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                               <button type="submit" class=" btn btn-primary ">Update Category</button>
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
          tinymce.init({
         selector:'#short_description',
         setup:function(editor){
         editor.on('Change',function(e){
           tinyMCE.triggerSave();
           var sd_data=$('#short_description').val();
           @this.set('short_description',sd_data);
         });
         }
          });

          tinymce.init({
            selector:'#description',
            setup:function(editor){
            editor.on('Change',function(e){
              tinyMCE.triggerSave();
              var sd_data=$('#description').val();
              @this.set('description',sd_data);
            });
            }
             });
      });
  </script>
@endpush
