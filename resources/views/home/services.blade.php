<div class="services_section layout_padding">
   <div class="container">
      <h1 class="services_taital">Blog Posts</h1>
      <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
      <div class="services_section_2">
         <div class="row">
            @foreach($post as $post)
            <div class="col-md-4 d-flex align-items-stretch">
               <div class="card">
                  <img src="/postimage/{{$post->image}}" class="services_img card-img-top">
                  <div class="card-body">
                     <h4 class="card-title">{{$post->title}}</h4>
                     <p class="card-text">Post by <b>{{$post->name}}</b></p>
                     <div class="btn_main"><a href="#" class="btn btn-primary">Read more</a></div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>
