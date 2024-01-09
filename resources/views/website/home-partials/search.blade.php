<!-- search-field-section -->
<section class="search-field-section">
    <div class="container">
        <div class="inner-container">
            <div class="search-field">
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons centred clearfix">
                            @foreach($categories as $key=>$category)
                                <li class="tab-btn @if($key == 0) active-btn @endif" data-tab="#tab-{{$key+1}}">{{(app()->getLocale() == 'en')?$category->name_en:$category->name_ar}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tabs-content info-group">
                        @foreach($categories as $key=>$category)
                            <div class="tab @if($key == 0) active-tab @endif" id="tab-{{$key+1}}">
                                <div class="inner-box">
                                    <div class="top-search">
                                        <form action="{{LaravelLocalization::localizeUrl('search-for')}}" method="GET" class="search-form">
                                            <div class="row clearfix">
                                                
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>{{trans('home.Project Name')}}</label>
                                                        <input class="form-control autoCompleteProject" name="project_name" placeholder="{{trans('home.Project Name')}}"/>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>{{trans('home.regions')}}</label>
                                                        <div class="select-box">
                                                            <i class="far fa-compass"></i>
                                                            <select class="wide" name="region_id">
                                                                <option></option>
                                                                @foreach($regions as $region)
                                                                    <option value="{{$region->id}}">{{(app()->getLocale()== 'en')?$region->name_en:$region->name_ar}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>{{trans('home.brands')}}</label>
                                                        <div class="select-box">
                                                            <i class="far fa-compass"></i>
                                                            <select class="wide" name="developer_id">
                                                                <option></option>
                                                                @foreach($brands as $brand)
                                                                    <option value="{{$brand->id}}">{{(app()->getLocale()== 'en')?$brand->name_en:$brand->name_ar}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>{{trans('home.project_area')}}</label>
                                                        <div class="select-box">
                                                            <i class="far fa-compass"></i>
                                                            <select class="wide" name="area">
                                                                <option></option>
                                                                <option value="70 To 120">{{trans('home.70 To 120')}}</option>
                                                                <option value="120 To 220">{{trans('home.120 To 220')}}</option>
                                                                <option value="220 To 350">{{trans('home.220 To 350')}}</option>
                                                                <option value="350 To 600">{{trans('home.350 To 600')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                    <div class="range-box">
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                                <div class="price-range">
                                                                    <h6>{{trans('home.Select Price Range')}}</h6>
                                                                    <div class="range-input">
                                                                        <div class="input"><input type="text" class="property-amount" readonly=""></div>
                                                                    </div>
                                                                    <div class="price-range-slider"></div>
                                                                    <input type="hidden" class="from" name="from" value="{{$projects->min('price')}}"/>
                                                                    <input type="hidden" class="to" name="to" value="{{$projects->max('price')}}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 col-md-12 col-12">
                                                    <div class="search-btn">
                                                        <button type="submit"><i class="fas fa-search"></i>{{trans('home.search')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- search-field-section end --> 