{{--<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
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
                                        <div class="col-md-10">
                                            <h3><strong>Tous les categories</strong></h3>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="{{route('admin.addcategories')}}" class="btn btn-success pull-right">Ajouter</a>
                                        </div>
                                    </div>
                                </div> 
                                
                                <div class="card-bod">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Image</th>
                                                <th>link</th>
                                                <th>Name</th>
                                                <th>Stock</th>
                                                <th>price</th>
                                                <th>Sale Price</th>
                                                <th>Category</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->id}}</td>
                                                <td><img src="{{asset('assets/images/products')}}/{{$product->image}}" width="60"></td>
                                                <td>{{$product->link}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->stock_status}}</td>
                                                <td>{{$product->regular_price}}</td>
                                                <td>{{$product->sale_price}}</td>
                                                <td>{{$product->category->name}}</td>
                                                <td>{{$product->created_at}}</td>
                                                <td>
                                                    <a href="#" class=""><i class="fa fa-edit fa-2x"></i></a>
                                                    <a href="#" onclick="confirm('Are you sure, You want to delete this category ?') || event.stopImmediatePropagation()">Supprimer</a>
            
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$products->links()}}
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
                                        <h3><strong>Tous les produits</strong></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.addproduct')}}" class="btn btn-success float-end">Ajouter</a>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Image</th>
                                            {{--<th class="text-center">link</th>--}}
                                            <th class="text-center">Nom Produits</th>
                                            <th class="text-center">Stock</th>
                                            <th class="text-center">prix</th>
                                            <th class="text-center">Sale Price</th>
                                            <th class="text-center">Categorie</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td class="text-center">{{$product->id}}</td>
                                            <td class="text-center"><img src="{{asset('assets/imgs/shop')}}/{{$product->image}}" width="60"></td>
                                            {{--<td class="text-center">{{$product->link}}</td>--}}
                                            <td class="text-center">{{$product->name}}</td>
                                            <td class="text-center">{{$product->stock_status}}</td>
                                            <td class="text-center">{{$product->regular_price}}</td>
                                            <td class="text-center">{{$product->sale_price}}</td>
                                            <td class="text-center">{{$product->category->name}}</td>
                                            <td class="text-center">{{$product->created_at}}</td>
                                            <td class="text-center">
                                                <a href="#" class=""><i class="fa fa-edit fa-2x"></i>Edite</a>
                                                <a href="#" onclick="confirm('Are you sure, You want to delete this category ?') || event.stopImmediatePropagation()">Supprimer</a>
        
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                {{$products->links()}}
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>




