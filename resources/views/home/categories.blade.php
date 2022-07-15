<section class="" style="margin: 50px 0;">
    <div class="container">
       <div class="categories border" style="margin: 0 100px;">
         <h1 class="p-3 mb-2 bg-danger text-white fs-1" style="font-size:30px;">Categiries</h1>
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