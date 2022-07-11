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
                      <h4 class="card-title">Tous les articles</h4>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th> N° post</th>
                              <th> Post </th>
                              <th> Description</th>
                              <th> Categorie</th>
                              <th> Image </th>
                              <th> Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($posts as $post)     
                                <tr>
                                    <td> {{$post->id}}</td>
                                    <td> {{$post->title}} </td>
                                    <td> {{$post->description}} </td>
                                    <td> {{$post->category}} </td>
                                    <td>
                                        <img src="/blogs/{{$post->image}}">
                                    </td>
                                    <td> 
                                        <a onclick="return confirm('Vous êtes sur de supprimer cet produits?')" class="badge badge-danger" href="{{url('/delete_post',$post->id)}}">supprimer</a>
                                        <a  class="badge badge-success" href="{{url('update_post',$post->id)}}">Modifier</a>    
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