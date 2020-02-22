@extends('frontend.layouts.master')
@section('title', Request::segment(1). ' - HOTLancer')

@section('css')
    <link rel="stylesheet" href="{!! asset('allscript/css/vendor/simple-line-icons.css') !!}">
    <link rel="stylesheet" href="{{asset('allscript/css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('allscript/css/vendor/jquery.range.css') }}">
    <link rel="stylesheet" href="{!! asset('allscript/css')!!}/hl-work.css">
@endsection
    <link rel="stylesheet" href="{{asset('allscript/workplace/jobs.css')}}">
<style type="text/css">
    .section{
    overflow: hidden;
    background: #fff;
    padding: 10px !important;
    margin-top: 10px !important;
}

.src-section{
    width: 86%;
    position: relative;
    margin: 0px auto;
    background: #fff;
    padding: 10px !important;
    margin-top: 10px !important;
}
.search_bar{
    position: absolute;
    top: 40px;
    left: 15px;
    margin: 0px auto;
    width:95%;
    border:1px solid #ccc;
    border-top: none;
    background: #fafafa;
    z-index: 999;
    display: none;

}
.search_bar li{
    padding: 10px;  
    display: block;
}
.search_bar li a{
    display: block;
}
.search_bar li:hover{
    
    background-color: #fff;
}

#loading
{
    text-align:center; 
    background: url('{{ asset("image/loading.gif")}}') no-repeat center; 
    height: 350px;
}

.sidebar-item b{
    background: #37d09c;
    color: #fff;
    display: block;
    padding: 10px;
}
</style>

@section('content')

    <!-- SECTION -->
    <div class="section-wrap">
        
        <div class="src-section">
            
            <form action="{{ route('job_search') }}"  >
                <div class="row">
                    <div class="col-xs-6 col-sm-7" style="position: relative;">
                        <input type="text" style="width: 100%;" value="{{(isset($_GET['item']) ? $_GET['item'] : '' )}}" required onkeyup="search_bar(this.value)" autocomplete="off" class="item" id="item" name="item" placeholder="Search goods or services here...">

                        <div class="search_bar" id="search_bar" >
                            <ul>
                                <span id="show_suggest_key"></span>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-3">
                        <label for="cat" class="select-block">
                            <select name="cat" id="cat">
                                <option  value="">All Categories</option>
                                @foreach($get_category as $show_category)

                                    <option {{(isset($_GET['cat']) && $_GET['cat'] == $show_category->category_url)? 'selected' : ''}} value="{{$show_category->category_url}}">{{$show_category->category_name}}</option>
                                @endforeach
                            </select>
                            <!-- SVG ARROW -->
                            <svg class="svg-arrow">
                                <use xlink:href="#svg-arrow"></use>
                            </svg>
                            <!-- /SVG ARROW -->
                        </label>
                    </div>
                    <div class="col-xs-2 col-sm-2">
                        <button class="button primary">Search</button>
                    </div>
                </div>
            </form>

        </div>
                
        <div class="section">
            <!-- SIDEBAR -->
            <div class="sidebar left">
                
                <div class="sidebar-item">
                    <b>Payment Type</b>
                   <br/>
                    <input type="radio"   id="all" class="common_selector" checked="" value="All" name="Payment">
                    <label for="all">
                        <span class="checkbox primary primary"><span></span></span>
                        Payment Type All
                       
                    </label>

                    <input type="radio" id="fixed" {{(isset($_GET['payment'])  && $_GET['payment'] == 'fixed'  ? 'checked' : '') }} class="common_selector payment" value="fixed" name="Payment">
                    <label for="fixed">
                        <span class="checkbox primary primary"><span></span></span>
                        Fixed Price
                       
                    </label>
                    <input type="radio"  {{(isset($_GET['payment'])  && $_GET['payment'] == 'monthly'  ? 'checked' : '') }} id="monthly" class="common_selector payment" value="monthly" name="Payment">
                    <label for="monthly">
                        <span class="checkbox primary primary"><span></span></span>
                        Monthly 
                        
                    </label>
                    
                        <!-- /CHECKBOX -->
                </div>
                <div class="sidebar-item range-feature">
                    <h4>Price Range</h4>
                    <hr class="line-separator spaced">
                    <input type="hidden" id="price-range"  class="price-range-slider tertiary" value="{{(isset($_GET['price'])? $_GET['price'] : '700') }}" form="shop_search_form">
                    <a form="shop_search_form" id="price_btn" class="button mid tertiary common_selector">Update your Search</a>
                </div>
            
            </div>
            <!-- /SIDEBAR -->

            <!-- CONTENT -->
            <div class="content right filter_data">
                
                <div class="col-lgh">
                    <div class="headline primary">
                        <h4>Recent Jobs</h4>
                        <div class="clearfix"></div>
                    </div>
                    @foreach($get_jobs as $show_job)
                       <div class="jp_job_post_main_wrapper_cont">
                        <div class="jp_job_post_main_wrapper">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="jp_job_post_side_img">
                                        <img src="{{asset('allscript')}}/images/job_post_img1.jpg" alt="post_img">
                                    </div>
                                    <div class="jp_job_post_right_cont">
                                        <h4><a  style="color: #00d7b3" href="{{ route('job-details' , $show_job->job_title_slug) }}">{!!$show_job->job_title!!}</a></h4>
                                        <p><a href="{{route('profile_view', $show_job->username)}}"> {!!$show_job->username!!} </a>&nbsp; <small style="color: #ccc;"> by {!! \Carbon\Carbon::parse($show_job->created_at)->diffForHumans()!!}</small></p>
                                        <ul>
                                            <li><i class="fa fa-cc-paypal"></i>&nbsp;  ${!!$show_job->budget!!}</li>
                                            <li><i class="fa fa-map-marker"></i>&nbsp;{!!$show_job->country!!}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="jp_job_post_right_btn_wrapper">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="#">{!!$show_job->price_type!!}</a></li>
                                            <li><a href="{!! route('job_proposal', $show_job->job_title_slug) !!}">Apply</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="jp_job_post_keyword_wrapper">
                            <ul>
                                <li><i class="fa fa-tags"></i>Keywords :</li>
                                @foreach(explode(',', $show_job->search_tag) as $search_tag)
                                    <li>{{$search_tag}}</li>
                                @endforeach
                            </ul>
                        </div>
                       </div>
                    @endforeach

                    <div class="page primary paginations"> {{$get_jobs->links()}} </div>
                </div>
            </div>
            <!-- CONTENT -->
        </div>
    </div>


@endsection

@section('js')
<!-- Owl Carousel -->
<script src="{{ asset('allscript/js/vendor/jquery.range.min.js') }}"></script>

<!-- XM LineFill -->
<script src="{!! asset('allscript')!!}/js/vendor/jquery.xmlinefill.min.js"></script>

<script src="{{ asset('allscript/js/shop.js') }}"></script>


<script type="text/javascript">
    function search_bar(src_key){
        
        $.ajax({
            method:'post',
            url:'{{ route("suggest_keyword") }}',
            data:{src_key:src_key, route: 'theme_search', _token: '{{csrf_token()}}'},
            datatype: "text",
            success:function(data){
                if(data !=null){
                    
                    document.getElementById('search_bar').style.display = 'block';
                    document.getElementById('show_suggest_key').innerHTML = data;
                }else{
                    
                    document.getElementById('search_bar').style.display = 'none';
                    
                }
            }
        });
    }

    function search_field(src){
        document.getElementById('item').value = src;
        document.getElementById('search_bar').style.display = 'none';
    }


    
    $( document.body ).click(function() {
        if($('#search_bar').css('display') == 'block'){
            document.getElementById('search_bar').style.display = 'none';
        }
    });


    $(document).ready(function(){
        $(document).on('click', '.pagination a', function(e){
        e.preventDefault();

            var page = $(this).attr('href').split('page=')[1];

            filter_data(page);
        });


        function filter_data(page)
        {
            $('.filter_data').html('<div id="loading" style="" ></div>');
            var tags = get_filter('platform');
            var filter_type = get_filter('filter_type');
            var payment = get_filter('payment');
            var price = document.getElementById('price-range').value;
            if(page == null){var page = 1;}
            //var delivery = get_filter('delivery');
            // var gig_sort = ($( "#gig_asc option:selected" ).val());
           
            var src_item = "{{Request::input('item')}}";
            var  link = '<?php echo route("job_search");?>/?item='+src_item+'&tags='+tags+'&filter_type='+filter_type+'&payment='+payment+'&page='+page+'&price='+price;
                history.pushState({id: 'workplace'}, 'search', link);

            $.ajax({
                url:link,
                method:"get",
                data:{
                    tags:tags,
                    filter:'filter',
                    route: 'job_search',
                    price:price,
                    //delivery:delivery,
                    
                },
                success:function(data){
                    if(data){
                        $('.filter_data').html(data);
                   }else{
                        $('.filter_data').html('Not Found');
                   }
                }
            });
        }

        function get_filter(class_name)
        {
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }
        $('.common_selector').click(function(){
            filter_data();
        });

        $('#gig_asc').on('change', function(){
            filter_data();
        });

        $('.common_selector').click(function(){
            filter_data();
        });


    });

</script>
@endsection