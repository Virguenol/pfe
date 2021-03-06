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
                <div class="card" style="margin-bottom:50px;">
                  <div class="card-body">
                    <h2 class="h2_font"> Ajouter une categorie</h2>
                   
                    <form class="forms-sample" action="{{url('/add_category')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group ">
                          <label for="exampleInputUsername1">Categorie</label>
                          <input style="background-color:rgb(11, 10, 10); color:white" type="text" class=" form-control"  name="category" required="" placeholder="categorie">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputUsername1">image</label>
                          <input type="file" class="form-control"  name="image" required="">
                        </div>
                      <button type="submit" class="btn btn-primary mr-2">Ajouter poste</button>
                    </form>
                  </div>
                </div>


                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Toutes les categories</h4>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>N-??</th>
                              <th> Categorie </th>
                              <th> Images </th>
                              <th> date de cr??ation </th>
                              <th> Action </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($datas as $data)     
                                <tr>
                                <td> {{$data->id}}</td>
                                <td> {{$data->category_name}} </td>
                                <td>
                                  <img src="/categories/{{$data->image}}">
                                </td>
                                  <td> {{$data->created_at}} </td>
                                <td> 
                                    <a onclick="return confirm('Vous ^ztes sur de supprimer cette categorie?')" class="badge badge-danger" href="{{url('delete_category',$data->id)}}">supprimer</a>
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