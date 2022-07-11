<section class="" style="margin: 70px 0;">
    <div class="container">
       <div class="categories border" style="margin: 0 200px;">
         <h1 class="p-3 mb-2 bg-danger text-white fs-1" style="font-size:30px;">Categiries</h1>
         <div class="row">
            @foreach($data as $data)
           <div class="col-3" style="flex-basis: 25%; ">
             <img src="/categories/{{$data->image}}" style="width: 100%">
           </div>
           @endforeach 
         </div>
       </div>
    </div>
 </section>