<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
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
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title" style="font-size: 20px;">Envoyer un email à {{$order->email}}</h4>
                      <form class="forms-sample" action="{{url('send_user_email', $order->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputUsername1">e-mail de salutation</label>
                          <input style="background-color:rgb(11, 10, 10);" name="greeting" type="text" class="form-control" id="exampleInputUsername1" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input style="background-color:rgb(11, 10, 10);" name="firstline" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Contenu du mail</label>
                          <input style="background-color:rgb(11, 10, 10);" name="body" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Boutton e-mail</label>
                            <input style="background-color:rgb(11, 10, 10);" name="button" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Url Email</label>
                            <input style="background-color:rgb(11, 10, 10);" name="url" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Envoyer la dernière ligne par e-mail</label>
                            <input style="background-color:rgb(11, 10, 10);" name="lastline" type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                          </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
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