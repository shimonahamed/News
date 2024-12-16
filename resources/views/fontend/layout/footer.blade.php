<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
    <div class="row py-4">
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">@lang('public.GetInTouch')</h5>
            <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
            <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
            <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
            <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
            <div class="d-flex justify-content-start">
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">@lang('public.popularNews')</h5>
            @foreach($popularNews as $popular)
            <div class="mb-3">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ __('public.categor.'. strtolower($popular->category->categrory_name)) }}</a>
                    <a class="text-body" href=""><small>{{date('M d, Y', strtotime($popular->date))}}</small></a>
                </div>
                <a class="small text-body text-uppercase font-weight-medium" href="">{{$popular->title}}</a>
            </div>
@endforeach

        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">@lang('public.category')</h5>
            <div class="m-n1">
                @foreach($categories as $catagory)

                    <a href="{{route('wb.cat',@$catagory->id)}}" class="btn btn-sm btn-secondary m-1">{{ __('public.categor.'. strtolower($catagory->categrory_name)) }}</a>

                    @endforeach

            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">@lang('public.flickrPhotos')</h5>
            <div class="row">
                @foreach($flickrphotos as $photos)
                <div class="col-4 mb-3">
                    <a href="{{route('wb.cat',@$photos->category->id)}}"><img style="width: 70px;height: 50px;" src="{{env('STORAGE_PATH')}}/{{$photos->img}}" alt=""></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
