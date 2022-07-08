<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
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

              <div class="card" style="text-align: center; margin:20px;">
                <form action="{{url('search')}}" methode="get">
                  @csrf
                 <input type="text" name="search" class="" placeholder="Recherche..." >
                  <input class="btn btn-sm btn-primary" value="Recherche..." type="submit" placeholder="Recherche..."> 
              </form>
            </div>

                    <div class="card-body">
                      <h4 class="card-title">Liste des commandes</h4>
                      </p>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                                <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Product_title</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Paiement</th>
                                <th>Livraison</th>
                                <th>Image</th>
                                <th>Livré</th>
                                <th>Télecharger en pdf</th>
                                <th>Envoyer un mail</th>
                                </tr>
                          </thead>
                          <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->product_title}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->price}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>{{$order->delivery_status}}</td>
                                    <td>
                                        <img src="/product/{{$order->image}}" alt="">
                                    </td>
                                    <td>
                                        @if($order->delivery_status=='En traitement...')
                                        <a href="{{url('delivered',$order->id)}}" class="btn btn-primary" onclick="return confirm('Vous êtes sur de liver')">Livrer</a>
                                        @else
                                        <p style="color: green">Déjà livrer</p>
                                        @endif 
                                    </td>
                                    <td>
                                        <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary" style="color: darkgreen">Télécharger</a>
                                    </td>
                                    <td>
                                      <a href="{{url('send_email', $order->id)}}" class="btn btn-secondary" style="color: darkgreen">Envoyer mail</a>
                                    </td>
                                </tr>
                                @empty
                                <div>
                                  <tr>
                                    <td class="table">
                                      <h1>Aucun nom ne correspond</h1></div> 
                                    </td>
                                  </tr> 
                            @endforelse
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
