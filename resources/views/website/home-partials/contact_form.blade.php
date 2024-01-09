<!-- contact-section -->
<section class="contact-section">
    <div class="container">
        <div class="inner-container">
            <div class="row align-items-center clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title">
                        <h5>{{$configration->app_name}}</h5>
                        <h2>{{trans('home.contact_us')}}</h2>
                        </div>
                        <div class="form-inner">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form id="contact-form" method="POST" action="{{LaravelLocalization::localizeUrl('save/contact-us')}}"> 
                                @csrf

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="name" placeholder="{{trans('home.name')}}" required value="{{old('name')}}">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="{{trans('home.email')}}" required value="{{old('email')}}">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="phone" placeholder="{{trans('home.phone')}}" required value="{{old('phone')}}">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="{{trans('home.message')}}">{{old('message')}}</textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button class="theme-btn btn-one" type="submit" name="submit-form">{{trans('home.send')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 map-column">
                    <div class="google-map-area">
                        <div class="google-map">
                            <iframe src="{{$setting->map_url}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-section end -->