<section class="product_section layout_padding ">            
   <div class="container" >
       <h1 class="p-3 mb-2 bg-danger text-white fs-1" style="font-size:30px; min-width:200px; margin-top:20px;">Nos produits</h1>
      <div class="heading_container heading_center">
      
         <!--featured products ---->
         <div class="small-container" style="max-width: 1080px; margin:auto; padding-left:25px; padding-right:25px;">
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
             {{session()->get('message')}}
            </div>
            @endif
            <div class="row">
               @foreach ($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4 border" style="flex-basis: 25%; padding:20px; margin:10px; 10px; minwidth:200px; margin_bottom:50px;  transform: translateY(-5);">
                  <div class="">
                     <img src="product/{{$products->image}}" alt="" style="width: 100%; hover:{transform:translateY(-5);}" >
                  </div>
                  <h4>{{$products->title}}</h4>
                  <div class="rating">
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star-half-o"></i>
                  </div>
                  <h4>${{$products->price}}</h4>
                  <div class="" >
                        <a href="{{url('product_details', $products->id)}}" class="btn btn-light border " style="margin: 5px;">Detali du produit</a>
                        <form action="{{url('/add_cart',$products->id)}}" method="Post">
                           @csrf
                           <div class="row">
                              <div class="col-md-4">
                                 <input type="hidden" name="quantity" value="1" min="1">
                                 <input type="submit" value="Ajouter dans le panier" class="btn btn-light border">
                              </div>
                           </div>
                        </form>
                  </div>
               </div>
               @endforeach
               <span style="padding-top: 20px;">
                  {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
               </span>
            </div>
         </div> 
      </div>
   </div>
</section>


