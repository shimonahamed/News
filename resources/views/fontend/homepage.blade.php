@extends('fontend.layout.master')
@section('content')
<!-- Main News Slider Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 px-0">
            <div class="owl-carousel main-carousel position-relative">
                @foreach($slider as $slide)
                <div class="position-relative overflow-hidden" style="height: 500px;">
                    <img class="img-fluid h-100" src="{{env('STORAGE_PATH')}}/{{$slide->img}}" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                               href="{{route('wb.cat',@$slide->category->id)}}">{{ __('public.categor.'. strtolower($slide->category->categrory_name)) }}</a>
                            <a class="text-white" href="">{{date('M d, Y', strtotime($slide->date))}}</a>
                        </div>
                        <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="{{route('wb.news', $slide->id)}}">{{$slide->title}}</a>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>






        <div class="col-lg-5 px-0">
            <div class="row mx-0">
                @foreach($news as $new)

                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="{{env('STORAGE_PATH')}}/{{$new->img}}" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                   href="{{route('wb.cat',@$new->category->id)}}">{{ __('public.categor.'. strtolower($new->category->categrory_name)) }}</a>
                                <a class="text-white" href=""><small>{{date('M d, Y', strtotime($new->date))}}</small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="{{route('wb.news', $new->id)}}">{{$new->title}}</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            </div>
            </div>



</div>
<!-- Main News Slider End -->


<!-- Breaking News Start -->
<div class="container-fluid bg-dark py-3 mb-3">
    <div class="container">
        <div class="row align-items-center bg-dark">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">@lang('public.breakingNews')</div>
                    <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                         style="width: calc(100% - 170px); padding-right: 90px;">
                        <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed faucibus nisl sodales</a></div>
                        <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed faucibus nisl sodales</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breaking News End -->


<!-- Featured News Slider Start -->


<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">@lang('public.featuredNews')</h4>
        </div>
        <div class="owl-carousel news-carousel carousel-item-4 position-relative">
            @foreach($FeaturedNews as $fnews)

            <div class="position-relative overflow-hidden" style="height: 300px;">
                <img class="img-fluid h-100" src="{{env('STORAGE_PATH')}}/{{$fnews->img}}" style="object-fit: cover;">
                <div class="overlay">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                           href="{{route('wb.cat',@$fnews->category->id)}}">{{ __('public.categor.'. strtolower($fnews->category->categrory_name)) }}</a>
                        <a class="text-white" href=""><small>{{date('M d, Y', strtotime($new->date))}}</small></a>
                    </div>
                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="{{route('wb.news', $fnews->id)}}">{{$new->title}}</a>
                </div>
            </div>
                @endforeach
        </div>
    </div>
</div>
<!-- Featured News Slider End -->


<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">@lang('public.latestNews')</h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                        </div>
                    </div>
                    @foreach($latestNews as $latnews)

                    <div class="col-lg-6">
                        <div class="position-relative mb-3">

                            <img class="img-fluid  w-100" src="{{env('STORAGE_PATH')}}/{{$latnews->img}}" style="object-fit: cover;">
                            <div class="bg-white border border-top-0 p-4">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                       href="{{route('wb.cat',@$latnews->category->id)}}">{{ __('public.categor.'. strtolower($latnews->category->categrory_name)) }}</a>
                                    <a class="text-body" href=""><small>{{date('M d, Y', strtotime($latnews->date))}}</small></a>
                                </div>
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{route('wb.news', $latnews->id)}}">{{$latnews->title}}</a>
                            </div>
                            <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-2" src="{{asset('fontend/img/user.jpg')}}" width="25" height="25" alt="">
                                    <small>{{@$ltnews->author->name}}</small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="ml-3"><i class="far fa-eye mr-2"></i>{{$latnews->view_count}}</small>
                                    <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach






                    <div class="col-lg-12 mb-3">
                        <a href=""><img class="img-fluid w-100" src="{{asset('fontend/img/ads-728x90.png')}}" alt=""></a>
                    </div>



                    @foreach($latestNews as $latnews)

                            <div class="col-lg-6">

                                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                    <img class="img-fluid" style="height: 80px" src="{{env('STORAGE_PATH')}}/{{$latnews->img}}" alt="">
                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                               href="{{route('wb.cat',@$latnews->category->id)}}">{{ __('public.categor.'. strtolower($latnews->category->categrory_name)) }}</a>

                                            <a class="text-body" href=""><small>{{date('M d, Y', strtotime($latnews->date))}}</small></a>
                                        </div>
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{route('wb.news', $latnews->id)}}">{{$latnews->title}}</a>
                                    </div>
                                </div>

                            </div>
                    @endforeach

                    @foreach($latNews as $ltnews)
                    <div class="col-lg-12">
                        <div class="row news-lg mx-0 mb-3">
                            <div class="col-md-6 h-100 px-0">
                                <img class="img-fluid h-100" src="{{env('STORAGE_PATH')}}/{{$ltnews->img}}" style="object-fit: cover;">
                            </div>
                            <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
                                <div class="mt-auto p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                           href="{{route('wb.cat',@$ltnews->category->id)}}">{{ __('public.categor.'. strtolower($ltnews->category->categrory_name)) }}</a>

                                        <a class="text-body" href=""><small>{{date('M d, Y', strtotime($latnews->date))}}</small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="{{route('wb.news', $ltnews->id)}}">{{$ltnews->title}}</a>

                                </div>
                                <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle mr-2" src="{{asset('fontend/img/user.jpg')}}" width="25" height="25" alt="">
                                        <small>{{@$ltnews->author->name}}</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>{{$ltnews->view_count}}</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-lg-12 mb-3">
                        <a href=""><img class="img-fluid w-100" src="{{asset('fontend/img/ads-728x90.png')}}" alt=""></a>
                    </div>

                    @foreach($latNews2 as $ltnew)

                    <div class="col-lg-6">

                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                            <img class="img-fluid" style="height: 80px"  src="{{env('STORAGE_PATH')}}/{{$ltnew->img}}" alt="">
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                       href="{{route('wb.cat',@$ltnew->category->id)}}">{{ __('public.categor.'. strtolower($ltnew->category->categrory_name)) }}</a>

                                    <a class="text-body" href=""><small>{{date('M d, Y', strtotime($ltnew->date))}}</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{route('wb.news', $ltnew->id)}}">{{$ltnew->title}}</a>
                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>
            </div>

            <div class="col-lg-4">
                <!-- Social Follow Start -->
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">@lang('public.followUs')</h4>
                </div>
                <div class="mb-3">
                    <div class="bg-white border border-top-0 p-3">
                        <a href="#" id="share-facebook" class="d-block w-100 text-white text-decoration-none mb-3"
                           style="background: #39569E;">
                            <i class="fab fa-facebook-f text-center py-4 mr-3"
                               style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Fans</span>
                        </a>
                        <a href="#" id="share-linkedin" class="d-block w-100 text-white text-decoration-none mb-3"
                           style="background: #0185AE;">
                            <i class="fab fa-linkedin-in text-center py-4 mr-3"
                               style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Connects</span>
                        </a>
                        <a href="#" id="share-instagram" class="d-block w-100 text-white text-decoration-none mb-3"
                           style="background: #C8359D;">
                            <i class="fab fa-instagram text-center py-4 mr-3"
                               style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Followers</span>
                        </a>
                        <a href="#" id="share-youtube" class="d-block w-100 text-white text-decoration-none mb-3"
                           style="background: #DC472E;">
                            <i class="fab fa-youtube text-center py-4 mr-3"
                               style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Subscribers</span>
                        </a>
                    </div>
                </div>
                <!-- Social Follow End -->

                <!-- Ads Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">@lang('public.advertisement')</h4>
                    </div>
                    <div class="bg-white text-center border border-top-0 p-3">
                        <a href=""><img class="img-src="{{asset('fontend/img/news-800x500-2.jpg')}}" alt=""></a>
                    </div>
                </div>
                <!-- Ads End -->

                <!-- Popular News Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">@lang('public.trandingNews')</h4>
                    </div>
                    @foreach($trandingNews as $news)
                    <div class="bg-white border border-top-0 p-3">

                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                            <img class="img-fluid" style="height: 80px"  src="{{env('STORAGE_PATH')}}/{{$news->img}}" alt="">
                            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                       href="{{route('wb.cat',@$news->category->id)}}">{{ __('public.categor.'. strtolower($news->category->categrory_name)) }}</a>

                                    <a class="text-body" href=""><small>{{date('M d, Y', strtotime($news->date))}}</small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{route('wb.news', $news->id)}}">{{$news->title}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- Popular News End -->

                <!-- Newsletter Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">@lang('public.Newsletter')</h4>
                    </div>
                    <div class="bg-white text-center border border-top-0 p-3">
                        <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                        <div class="input-group mb-2" style="width: 100%;">
                            <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                            <div class="input-group-append">
                                <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                            </div>
                        </div>
                        <small>Lorem ipsum dolor sit amet elit</small>
                    </div>
                </div>
                <!-- Newsletter End -->

                <!-- Tags Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">

                        <h4 class="m-0 text-uppercase font-weight-bold">@lang('public.Tags')</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <div class="d-flex flex-wrap m-n1">
                            @foreach($tags as $tag)
                            <a href="{{route('wb.cat',@$tag->category->id)}}" class="btn btn-sm btn-outline-secondary m-1">
                                {{ __('public.categor.'. strtolower($tag->category->categrory_name)) }}</a>
                                @endforeach
                        </div>
                    </div>
                </div>
                <!-- Tags End -->
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->
@endsection