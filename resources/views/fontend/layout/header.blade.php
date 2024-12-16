<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-white font-weight-normal">News</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{url('/')}}" class="nav-item nav-link active">@lang('public.home')</a>
                <a href="" class="nav-item nav-link">@lang('public.category')</a>


                <a href="" class="nav-item nav-link">@lang('public.singleNews')</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">@lang('public.language')</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{url('locale/en')}}" class="dropdown-item">English</a>
                        <a href="{{url('locale/bn')}}" class="dropdown-item">Bangla</a>
                        <a href="{{url('locale/hi')}}" class="dropdown-item">Hindi</a>
                    </div>
                </div>
                <a href="" class="nav-item nav-link">@lang('public.contact')</a>
            </div>
            <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                <input type="text" class="form-control border-0" placeholder="Keyword">
                <div class="input-group-append">
                    <button class="input-group-text bg-primary text-dark border-0 px-3"><i
                                class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </nav>
</div>