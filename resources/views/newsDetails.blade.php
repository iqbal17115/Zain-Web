@include('layouts.header')
<article class="blog-post-wrapper">
    <div class="post-thumbnail">
        <br>
        <br>
        <br>
        <br>
        <br>
        <center>
      <img class="rounded" src="{{asset('news_imgs/'.$news->news_img)}}" alt="">
        </center>
    </div>
    <div class="post-information">
        <center>
      <h2>{{$news->news_title}}</h2>
      <div class="entry-meta">
        <span class="author-meta"><i class="fa fa-user"></i> <a href="">{{$news->users->name}}</a></span>
        <span><i class="fa fa-clock-o"></i>{{$news->users->created_at}}</span>
        <span class="tag-meta">
                                    
        
      </div>
      <div class="entry-content">
        <p>{!!$news->news_desc!!}</p>
      </div>
    </div></center>
  </article>




@include('layouts.footer')