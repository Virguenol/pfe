<

 <section class="container" style="margin-bottom:0">
   <h1 class="p-3 mb-2 bg-danger text-white fs-1" style="font-size:30px; min-width:200px; margin-top:20px;">Solde</h1>
   <div class="container">
            <div class="row flex">
                  @foreach($sale as $sale)
                  <a href="{{url('product_details', $sale->id)}}">
                  <div class="col-sm-6 col-md-4 col-lg-4 border" style="flex-basis: 15%; padding:2px; margin:2px; 2px; min-width:200px; margin-bottom:2px;">
                     <img src="/product/{{$sale->image}}" style="width: 100%">        
                        <h3 class="discount_price">${{$sale->discount_price}}</h3>
                     </a>
                  </div>
               @endforeach 
            </div>
      </div>
</section>

