<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

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
                      <h4 class="card-title">Ajouter un produit</h4>
                     
                      <form class="forms-sample" action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label for="exampleInputUsername1">Nom produit</label>
                            <input style="background-color:rgb(11, 10, 10); color:white" type="text" class=" form-control"  name="title" required="" placeholder="Nom produit">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputUsername1">Description produit</label>
                            <textarea style="background-color:rgb(11, 10, 10); color:white" type="text" class="form-control"  name="description" required="" placeholder="Description produit"></textarea>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputUsername1">Prix produit</label>
                            <input style="background-color:rgb(11, 10, 10); color:white" type="text" class="form-control"  name="price" required="" placeholder="Prix produit">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputUsername1">Quantité</label>
                            <input style="background-color:rgb(11, 10, 10); color:white" type="text" class="form-control"  name="quantity" required="" placeholder="quantité">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputUsername1">Remise produit</label>
                            <input style="background-color:rgb(11, 10, 10); color:white" type="text" class="form-control"  name="discount_price" required="" placeholder="remise produit">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputUsername1">Categorie produit</label>
                            <select class="form-control" class="form-control"  name="category"style="background-color:rgb(11, 10, 10); color:white" >
                                <option value="" selected="">Category1</option>
                                @foreach ($category as $category)
                                <option value="">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="exampleInputUsername1">image produit</label>
                            <input type="file" class="form-control"  name="image" required="" placeholder="remise produit">
                          </div>
                      
                        <button type="submit" class="btn btn-primary mr-2">Ajouter produit</button>
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