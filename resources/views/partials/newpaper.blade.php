<div class="row">
     <div class="col-md-6">
          <h2 class="title text-center" style="margin-top:30px">Tin tức mới nhất</h2>
          <div class="row">
               <div class="col-md-2"></div>
               <div class="col-md-8">
                    @foreach ($newpaper_last as $Item)
                    <article class="item-news item-news-common off-thumb">
                         <h3 class="title-news"><a href="{{ route('page.paper', ['id' => $Item->id]) }}">{{ $Item->tittle }}</a></h3>
                         <p class="description"><a href="">Tác giả: {{ $Item->author }}</a><span class="meta-news"></p>
                         <p class="description"><a href="">Thời gian: {{ $Item->created_at }}</a><span class="meta-news"></p>
                    </article>
                    @endforeach
               </div>
          </div>
     </div>
     <div class="col-md-6">
          <h2 class="title text-center" style="margin-top:30px">Tin tức hot</h2>
          <div class="row">
               <div class="col-md-2"></div>
               <div class="col-md-8">
                    @foreach ($newpaper_hot as $Item)
                    <article class="item-news item-news-common off-thumb">
                         <h3 class="title-news"><a href="{{ route('page.paper', ['id' => $Item->id]) }}">{{ $Item->tittle }}</a></h3>
                         <p class="description"><a href="">Tác giả: {{ $Item->author }}</a><span class="meta-news"></p>
                         <p class="description"><a href="">Lượt xem: {{ $Item->view }}</a><span class="meta-news"></p>
                    </article>
                    @endforeach
               </div>
          </div>
     </div>
     <div class="col-md-12">
          <h2 class="title text-center" style="margin-top:30px">Tất cả tin tức</h2>
          <div class="row">
               <div class="col-md-2"></div>
               <div class="col-md-8">
                    @foreach ($newpaper_all as $Item)
                    <article class="item-news item-news-common off-thumb">
                         <h3 class="title-news"><a href="{{ route('page.paper', ['id' => $Item->id]) }}">{{ $Item->tittle }}</a></h3>
                         <p class="description"><a href="">Tác giả: {{ $Item->author }}</a><span class="meta-news"></p>
                         <p class="description"><a href="">Lượt xem: {{ $Item->view }}</a><span class="meta-news"></p>
                    </article>
                    @endforeach
               </div>
          </div>
     </div>
</div>