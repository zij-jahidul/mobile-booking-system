@php
    use App\Banner;
    $getBanners = Banner::getBanners();
    // echo '<pre>';
    //     print_r($getBanners);
    //     die();

@endphp
@if (isset($page_name)&& $page_name=='index')



<section id="banner_part">

        <!-- Foreach Start -->
        @foreach ($getBanners as $key => $banner)
        <div class="slider_active" style="background: url({{ asset('images') }}/banner_images/{{ $banner['banner_main_image'] }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="banner_text">
                            <h1 class="text-center">{{ $banner['banner_title'] }}</h1>
                            {{-- <h2 class="ml-5"><i class="fab fa-apple"></i> Macbook</h2>
                            <h2 class="ml-5"><i class="fab fa-apple"></i> iMac</h2>
                            <h2 class="ml-5 mb-3"><i class="fab fa-apple"></i> Macbook air</h2> --}}
                            <h2 class="text-light ml-5 mb-3">
                                @php
                                echo html_entity_decode($banner['banner_long_description']);
                                @endphp
                            </h2>

                            @if (!empty($banner['banner_url']))
                            <a class="ml-5 mt-3" href="{{ $banner['banner_url'] }}">Booking Now</a>
                            @endif
                        </div><!-- /. -->
                    </div><!-- /. -->

                    <div class="col-lg-6 text-center">
                        <div class="banner_text">
                            <img src="{{ asset('images') }}/banner_short_image/{{ $banner['banner_image'] }}" alt="img" class="img-fluid" style="height: 300px; margin-top: 10%;">
                        </div><!-- /. -->
                    </div><!-- /. -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.slider_active -->
        @endforeach


    </section>
@endif
