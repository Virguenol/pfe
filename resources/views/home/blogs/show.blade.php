<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
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

      <style>
        .articles
        {
            margin-top: 50px;
        }
        .articles .article
        {
            
            margin-bottom: 30px;
        }
        .articles .article .left img
        {
            width: 100%;
            
        }
        .articles .article .right
        {
            max-width: 50%;
            margin-left: 40px;
        }
        .articles .article .right p.date
        {
            color: #7f7e7e;
        }

        @media screen and (max-width:640px){
            .articles .article .left img
            {
                width: 100%;
                height: 100%;
            }
            .articles .article .right
            {
            max-width: 0;
            margin-left: 100%;
            }

        }

      </style>

   </head>
   <body>
      <div class="container">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <section class="articles">
            <div class="article">
                <div class="left">
                    <img src="blogs/{{$posts->image}}" alt="">
                </div>
                <div class="right"> 
                    <p class="date">{{$posts->created_at}}</p>

                    <h1>{{$posts->title}}</h1>
                    <p class="description">{{$posts->description }}</p>
                    <p class="auteur">lisungi</p>
                </div>
            </div>

         </section>
       
      </div>
      <!-- footer start -->
      @include('home.footer')
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