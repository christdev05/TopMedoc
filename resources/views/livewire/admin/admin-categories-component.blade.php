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
                                            <h3><strong>Tous les categories</strong></h3>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{route('admin.addcategories')}}" class="btn btn-success float-end">Ajouter</a>
                                        </div>
                                    </div>
                                </div> 
                                
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Id</th>
                                                <th  class="text-center">Categorie Nom</th>
                                                <th  class="text-center">Slug</th>
                                                <th  class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $category)
                                            <tr>
                                                <td  class="text-center">{{$category->id}}</td>
                                                <td  class="text-center">{{$category->name}}</td>
                                                <td  class="text-center">{{$category->slug}}</td>
                                                <td  class="text-center">
                                                    <a href="{{route('admin.editcategories',['category_slug'=>$category->slug])}}" class="text-info" >Editer</a>
                                                    <a href="#" onclick="confirm('Are you sure, You want to delete this category ?') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})" class="text-danger" style="margin-left: 20px;">Supprimer</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right">
                                    {{$categories->links()}}
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
</div>


