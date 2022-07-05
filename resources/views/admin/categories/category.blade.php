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
                <div class="div_center">
                    <h2 class="h2_font"> Ajouter les Categories</h2>

                    <form action="{{url('/add_category')}}" method="POST">
                        @csrf
                        <div class="add-items d-flex">
                        <input class="input_color form-control todo-list-input" type="text" name="category" placeholder="categorie">
                        <input class="btn btn-primary " type="submit" name="submit" value="Ajouter Category">
                        </div>
                    </form>
                </div>

                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Toutes les categories</h4>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>N-°</th>
                              <th> Categorie </th>
                              <th> Sous categories</th>
                              <th> date de création </th>
                              <th> Action </th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($datas as $data)     
                                <tr>
                                <td> {{$data->id}}</td>
                                <td> {{$data->category_name}} </td>
                                <td> {{$data->id}} </td>
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