<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style type="text/css">
            table{
                margin: auto;
                width: 50%;
                text-align: center;
                padding: 30px;
            }
            tr{
                padding: 30px;
            }
            .total_deg{
                font-size: 20px;
                padding: 0px;
                text-align: center;
            }

      </style>

   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @if(session()->has('message'))
         <div class="alert alert-success">
             <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
          {{session()->get('message')}}
         </div>

         @endif
        
        <div class="container" style="margin-top: 50px">
         <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom Produit</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Payement Status</th>
                    <th scope="col">Delivery Status</th>
                    <th scope="col">Image</th>
                    <th scope="col">Cancel Order</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order as $order)
                <tr>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payement_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td style="width:50px"><img src="/product/{{$order->image}}"></td>
                    
                    <td>
                        @if($order->delivery_status == 'En traitement...')
                          <a href="{{url('cancel_order', $order->id)}}" class="btn btn-danger" onclick="return confirm('d\'annuler la commande')">Annuler</a>
                          @else
                            <p slyle="clor: blue; ">Déjà livrer</p>
                        @endif
                    </td>
                </tr>

                @endforeach
            </tbody>
         </table>
        </div>
     <!-- end slider section -->
    </div>
    <!-- why section -->
     
      <!-- footer start -->
      
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>