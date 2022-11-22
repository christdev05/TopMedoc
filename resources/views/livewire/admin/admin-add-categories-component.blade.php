
 <div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Acceuil</a>
                    <span></span>Categories
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
                                        <h3><strong>Ajouter categories</strong></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.categories')}}" class="btn btn-success float-end">Retour</a>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="card-body">
                              @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{session::get('message')}}</div>
                              @endif
                              <form wire:submit.prevent="storeCategory">
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Nom Categorie</label>
                                    <input type="text" name="name" class="form-control" placeholder="Entrer le nom de la categorie" wire:model="name" wire:keyup="generateslug" />
                                    @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="slug" class="form-label">Slug Categorie</label>
                                    <input type="text" name="slug" class="form-control" placeholder="Entrer le nom de la categorie" wire:model="slug" />
                                    @error('slug') <p class="text-danger">{{$message}}</p> @enderror
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


