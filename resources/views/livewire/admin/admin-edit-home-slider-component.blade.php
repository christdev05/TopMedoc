
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
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.homeslider')}}" class="btn btn-success float-end">Retour</a>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="card-body">
                              @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{session::get('message')}}</div>
                              @endif
                              <form enctype="multipart/form-data" wire:submit.prevent="updateSlide">
                                <div class="mb-3 mt-3" wire:ignore>
                                    <label class="col-md-4 control-label">Titre</label>
                                        <input type="text" placeholder="Titre slider" class="form-control input-md" wire:model="title"/>
                                        @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <div class="mb-3 mt-3" wire:ignore>
                                    <label class="col-md-4 control-label">Sous titre</label>
                                        <input type="text" name="subtitle" placeholder="Sous titre" class="form-control input-md" wire:model="subtitle"/>
                                        @error('subtitle') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <div class="mb-3 mt-3" wire:ignore>
                                    <label class="col-md-4 control-label">Description</label>
                                        <input type="text" name="description" placeholder="Description" class="form-control input-md" wire:model="description"/>
                                        @error('description') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <div class="mb-3 mt-3" wire:ignore>
                                    <label class="col-md-4 control-label">Text</label>
                                        <textarea class="form-control" id="text" placeholder="Short Description" wire:model="text"></textarea>
                                        @error('text') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <div class="mb-3 mt-3" wire:ignore>
                                    <label class="col-md-4 control-label">Status</label>
                                    <select class="form-control" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                        @error('status') <p class="text-danger">{{$message}}</p> @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label class="col-md-4 control-label">Product Image</label>
                                        <input type="file" placeholder="Product Image" class="input-file form-control" wire:model="newimage"/>
                                        @if($newimage)
                                            <img src="{{$newimage->temporaryUrl()}}" width="120">
                                        @else
                                            <img src="{{asset('assets/images/sliders')}}/{{$image}}" width="120">
                                        @endif
                                        @error('image') <p class="text-danger">{{$message}}</p> @enderror
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


