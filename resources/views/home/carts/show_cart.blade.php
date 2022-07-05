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
                    <th scope="col">Id</th>
                    <th scope="col">Nom produit</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalprice = 0; ?>
                @foreach($carts as $cart)
                <tr>
                <th scope="row">{{$cart->id}}</th>
                    <td>{{$cart->product_title}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>{{$cart->price}}</td>
                    <td style="width:50px"><img src="/product/{{$cart->image}}" ></td>
                    <td><a href="{{url('remove_cart', $cart->id)}}" class="btn btn-danger" onclick="return confirm('Etre vous sur de supprimer')">Supprimer</a></td>
                </tr>

                <?php $totalprice = $totalprice + $cart->price ?>

                @endforeach
            </tbody>
         </table>

         <div>
            <h1 class="total_deg">Total Price : ${{$totalprice}}</h1>
         </div>
         <div class="total_deg" style="padding-top: 10px">
            <h1 style="padding-bottom: 5px">Passer la commande</h1>
            <a href="{{url('/cash_order')}}" class="btn btn-danger">Paiement à la livraison</a>
            <a href="{{url('/stripe',$totalprice)}}" class="btn btn-primary">Payer par carte</a>
         </div>
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