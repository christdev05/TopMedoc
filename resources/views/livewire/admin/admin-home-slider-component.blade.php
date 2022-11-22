<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{route('home.index')}}" rel="nofollow">Acceuil</a>
                    <span></span>Home Slider
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
                                        <a href="{{route('admin.addhomeslider')}}" class="btn btn-success float-end">Ajouter</a>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Subtitle</th>
                                            <th class="text-center">description</th>
                                            <th class="text-center">text</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sliders as $slider)
                                        <tr>
                                            <td class="text-center">{{$slider->id}}</td>
                                            <td class="text-center"><img src="{{asset('assets/imgs/slider')}}/{{$slider->image}}" width="120" /></td>
                                            <td class="text-center">{{$slider->title}}</td>
                                            <td class="text-center">{{$slider->subtitle}}</td>
                                            <td class="text-center">{{$slider->description}}</td>
                                            <td class="text-center">{{$slider->text}}</td>
                                            <td class="text-center">{{$slider->status == 1 ? 'Active':'Inactive'}}</td>
                                            <td class="text-center">{{$slider->created_at}}</td>
                                            <td  class="text-center">
                                                <a href="{{route('admin.edithomeslider',['slide_id'=>$slider->id])}}" class="text-info" >Editer</a>
                                                <a href="#"  style="margin-left:10px; "><i class="fa fa-times fa-2x text-danger"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>


