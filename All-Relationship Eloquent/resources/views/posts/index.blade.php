<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            @foreach ($posts as $post )
               <h2>{{ $post->title }}</h2>
             <ul></ul>
             @foreach ($post->tags as $tag )
                <li>{{ $tag->name }}</li>
             @endforeach
            @endforeach
            
         </div>
      </div>
   </div>
</div>
 