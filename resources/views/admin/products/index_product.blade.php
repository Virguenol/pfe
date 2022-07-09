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
            color: rgb(255, 255, 255);
        }
        .image_size
        {
            
            width: 200px;
            height: 200;
           
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
                      <h4 class="card-title">Toutes des produits</h4>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th> N° produit</th>
                              <th> Produit </th>
                              <th> Description</th>
                              <th> Quantité </th>
                              <th> Categorie </th>
                              <th> Prix </th>
                              <th> Remise </th>
                              <th> Image </th>
                              <th> Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($products as $product)     
                                <tr>
                                    <td> {{$product->id}}</td>
                                    <td> {{$product->title}} </td>
                                    <td> {{$product->description}} </td>
                                    <td> {{$product->quantity}} </td>
                                    <td> {{$product->category}} </td>
                                    <td> {{$product->price}}  </td>
                                    <td> {{$product->discount_price}}     </td>
                                    <td>
                                        <img src="/product/{{$product->image}}">
                                    </td>
                                    <td> 
                                        <a onclick="return confirm('Vous êtes sur de supprimer cet produits?')" class="badge badge-danger" href="{{url('/delete_product',$product->id)}}">supprimer</a>
                                        <a  class="badge badge-success" href="{{url('update_product',$product->id)}}">Modifier</a>    
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
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>