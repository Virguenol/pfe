<section class="arrival_section">
    <div class="container">
       <div class="box">
          <div class="arrival_bg_box">
             <img src="images/arrival-bg.png" alt="">
          </div>
          <div class="row">
             <div class="col-md-6 ml-auto">
                <div class="heading_container remove_line_bt">
                   <h2>
                      #NewArrivals
                   </h2>
                </div>
                <p style="margin-top: 20px;margin-bottom: 30px;">
                   Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem, fugit ullam sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab ipsa, autem similique ex unde!
                </p>
                <a href="">
                  Achetez maintenant
                </a>
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="" style="margin: 50px 0;">
   <div class="container">
      <div class="categories border" style="margin: 0 100px;">
        <h1 class="p-3 mb-2 bg-danger text-white fs-1" style="font-size:30px;">Solde</h1>
        <div class="row">
           @foreach($data as $data)
          <div class="col-3" style="flex-basis: 30%; ">
            <img src="/categories/{{$data->image}}" style="width: 100%">
            <h3 class="titre_categorie">{{$data->category_name}}</h3>
          </div>

          @endforeach 
        </div>
      </div>
   </div>
</section>