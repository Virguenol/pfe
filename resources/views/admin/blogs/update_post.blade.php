<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">

    <style type="text/css">
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }
        .h2_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color
        {
            color: rgb(0, 0, 0);
        }
        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid green;
        }
    </style>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">  
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
                 {{session()->get('message')}}
                </div>

                @endif
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Modifier un produit</h4>
                     
                      <form class="forms-sample" action="{{url('/update_post_confirm', $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label for="exampleInputUsername1">Titre</label>
                            <input style="background-color:rgb(11, 10, 10);" type="text" class=" form-control"    value="{{$post->title}}" name="title" placeholder="Nom produit">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputUsername1">Descriptiont</label>
                            <textarea style="background-color:rgb(11, 10, 10);" type="text" class="form-control"  name="description"  value="{{$post->description}}" name="description" placeholder="Description produit"></textarea>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputUsername1">Categorie</label>
                            <select class="form-control" class="form-control"  name="category"  style="background-color:rgb(11, 10, 10); color:white">
                                <option value="{{$post->category}}" selected="">{{$post->category}}</option>       
                                @foreach ($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>       
                                @endforeach                        
                            </select>
                          </div>

                          <div >
                            <label for="exampleInputUsername1">Image produit</label>
                            <img style="margin: :auto" width="100" height="100" src="/blogs/{{$post->image}}">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputUsername1">Changer l'image</label>
                            <input style="background-color:rgb(11, 10, 10);" type="file" class="form-control"  name="image"  name="title" placeholder="remise produit">
                          </div>
                      
                        <button  type="submit" class="btn btn-primary mr-2">Modifier le produit</button>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
        
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>