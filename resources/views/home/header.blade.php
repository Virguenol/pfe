
<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
               <form method="POST" action="{{url('product_search')}}" class="input-group mb-3" style="text-align:center;">
                  <input type="text" name="search" style="width: 500px;" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
               </form>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/show_cart')}}">Panier</a>
               </li>
                 @if(Route::has('login'))

                 @auth
                 <li class="nav-item">
                     <x-app-layout>
   
                     </x-app-layout>
                 </li>
                 @else
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ route('login') }}" id="logincss">Login</a>
                 </li>
                
                 <li class="nav-item">
                    <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                 </li>
                 @endauth

                 @endif

             </ul>
          </div>
       </nav>

       <nav class="navbar navbar-expand-lg custom_nav-container" >
         <div class="collapse navbar-collapse" id="navbarSupportedContent" style="text-align: center;">
            <ul class="navbar-nav" style="text-align: center;">
               <li class="nav-item active">
                  <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
               </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <li><a href="about.html">About</a></li>
                     <li><a href="testimonial.html">Testimonial</a></li>
                  </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="product.html">Boutique</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{url('/blog')}}">Blog</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact</a>
               </li>
               <li class="nav-item">
                 <a class="nav-link" href="{{url('/show_order')}}">Commande</a>
              </li>
            </ul>
         </div>
      </nav>
    </div>
 </header>