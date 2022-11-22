{{--<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Acceuil</a>
                    <span></span>Editer Categories
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Editer categories</h3>
                                        </div>
                                        @if(Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{session::get('message')}}</div>
                                        @endif                                        
                                        <form wire:submit.prevent="updateCategory">
                                            <div class="form-group">
                                                <input type="text" required="" name="name" placeholder="Nom Categorie" wire:model="name" wire:keyup="generateslug">
                                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="slug" placeholder="Category Slug" wire:model="slug">
                                                @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-10">
                                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">RETOURS</a>
                                                </div>
                                            </div>
                                        </form>                                        
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>--}}

<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Acceuil</a>
                    <span></span>Editer Categories
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
                                        <h3><strong>Editer categories</strong></h3>
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
                              <form wire:submit.prevent="updateCategory">
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
                                <button class="btn btn-primary flot-end">Modifier</button>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
