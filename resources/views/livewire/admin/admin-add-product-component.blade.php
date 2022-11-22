
 <div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Acceuil</a>
                    <span></span>Produits
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                           <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3><strong>Ajouter Produits</strong></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.products')}}" class="btn btn-success float-end">Retour</a>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="card-body">
                              @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{session::get('message')}}</div>
                              @endif
                              <form enctype="multipart/form-data" wire:submit.prevent="addProduct">
                                {{--<div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Nom Categorie</label>
                                    <input type="text" name="name" class="form-control" placeholder="Entrer le nom de la categorie" wire:model="name" wire:keyup="generateslug" />
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="slug" class="form-label">Slug Categorie</label>
                                    <input type="text" name="slug" class="form-control" placeholder="Entrer le nom de la categorie" wire:model="slug" />
                                    @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                </div>--}}
                                <div class="mb-3 mt-3" wire:ignore>
                                    <label class="col-md-4 control-label">Product Name</label>
                                        <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateSlug"/>
                                        @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <div class="mb-3 mt-3" wire:ignore>
                                    <label class="col-md-4 control-label">Product Slug</label>
                                        <input type="text" name="slug" placeholder="Product Slug" class="form-control input-md" wire:model="slug"/>
                                        @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <div class="mb-3 mt-3" wire:ignore>
                                    <label class="col-md-4 control-label">Product links</label>
                                        <input type="text" name="link" placeholder="Product Link" class="form-control input-md" wire:model="link"/>
                                        @error('link') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <div class="mb-3 mt-3" wire:ignore>
                                    <label class="col-md-4 control-label">Short Description</label>
                                        <textarea class="form-control" id="short_description" placeholder="Short Description" wire:model="short_description"></textarea>
                                        @error('short_description') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <div class="mb-3 mt-3" wire:ignore>
                                    <label class="col-md-4 control-label">Description</label>
                                        <textarea class="form-control" id="description" placeholder="Description" wire:model="description"></textarea>
                                        @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <div class="mb-3 mt-3" >
                                    <label class="col-md-4 control-label">Regular Price</label>
                                        <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price"/>
                                        @error('regular_price') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="col-md-4 control-label">Sale Price</label>
                                        <input type="text" placeholder="Sale Price" class="form-control input-md" wire:model="sale_price"/>
                                        @error('sale_price') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="col-md-4 control-label">SKU</label>
                                        <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU"/>
                                        @error('SKU') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="col-md-4 control-label">Stock</label>
                                        <select class="form-control" wire:model="stock_status">
                                            <option value="instock">InStock</option>
                                            <option value="outofstock">Out of Stock</option>
                                        </select>
                                        @error('stock_status') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="col-md-4 control-label">Featured</label>
                                        <select class="form-control" wire:model="featured">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="col-md-4 control-label">Quantity</label>
                                        <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity"/>
                                        @error('quantity') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="col-md-4 control-label">Product Image</label>
                                        <input type="file" placeholder="Product Image" class="input-file form-control" wire:model="image"/>
                                        @if($image)
                                            <img src="{{$image->temporaryUrl()}}" width="120">
                                        @endif
                                        @error('image') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="col-md-4 control-label">Category</label>
                                        <select class="form-control" wire:model="category_id">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <button class="btn btn-primary flot-end">Enregistrer</button>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@push('scripts')
    <script>
        $(function () {
            tinymce.init({
               selector: '#short_description',
                setup:function (editor) {
                   editor.on('Change',function (e) {
                        tinyMCE.triggerSave();
                        var  sd_data = $('#short_description').val();
                        @this.set('short_description',sd_data);

                   })
                }
            });

            tinymce.init({
                selector: '#description',
                setup:function (editor) {
                    editor.on('Change',function (e) {
                        tinyMCE.triggerSave();
                        var  d_data = $('#description').val();
                    @this.set('description',d_data);

                    })
                }
            });

        });
    </script>
@endpush



