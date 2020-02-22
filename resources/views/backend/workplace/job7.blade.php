@extends('backend.layouts.master')
@section('title', $get_job->job_title)


@section('css')
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/hl-work.css">
    <link rel="stylesheet" href="{{asset('/allscript')}}/css/c.css">
    
@endsection

@section('content')
        <!-- DASHBOARD CONTENT -->
        <div class="dashboard-content">
            <!-- /HEADLINE -->
            <div class="worklaft1">
                <a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Title</p>
                    <span class="sl-icon icon-check"></span>
                </a>
                <a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Description </p>
                    <span class="sl-icon icon-check"></span>
                </a>
                <a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Details </p>
                    <span class="sl-icon icon-check"></span>
                </a>
                <a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Expertise </p>
                    <span class="sl-icon icon-check"></span>
                </a>
                <a href="#" class="worklaft1 ">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Visibility </p>
                    <span class="sl-icon icon-check"></span>
                </a>
                <a href="#" class="worklaft1">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Budget </p>
                    <span class="sl-icon icon-check"></span>
                </a>
                <a href="#" class="worklaft1 selected">
                    <span class="sl-icon icon-drawer"></span>
                    <p class="worklafttt">Review </p>
                    <span class="sl-icon icon-check"></span>
                </a>
            </div>
        <form  action="{{url('dashboard/workplace/job-post/insert/step_seven')}}" method="post">
                {{csrf_field()}}
            <input type="hidden" name="slug" value="{{$get_job->job_title_slug}}">
               
            <div class="workr81">
                <div class="workttsr">
                    <div class="workttse22">
                        <h2 class="workbottom">JOB PREVIEW</h2>
                        <span> Step 7 of 7 </span>
                    </div>
                    <div class="cattwork">
                        <b class="cattworks">Title</b><hr/>


                        <b class="cattworks">Job title</b><br>
                        <p>{{$get_job->job_title}}</p>

                        <span style="float: left; margin-right: 15%;">
                        <b class="cattworks">Job category</b><br>
                        <p>{{$get_job->category_name}}</p>
                        </span>

                        <span style="float: left;">
                        <b class="cattworks">Job sub category</b><br>
                        <p>{{$get_job->subcategory_name}}</p>
                        </span>
                        
                    </div>    
                </div>

                <div class="cattwork">
                    <b class="cattworks">Description </b><hr/>
                    
                    <p>{!! $get_job->job_dsc !!}</p>
                    
                </div>

                <br/> <div class="cattwork">
                    <b class="cattworks">Job details </b><hr/>


                    <b class="cattworks">Type of Project </b><br>
                    
                    <p>{{$get_job->project_type }}</p>
                    
                </div><br/> 

                <div class="cattwork">
                    <b class="cattworks">Expertise </b><hr/>

                    <div class="workttse222">

                        @foreach($get_filters as $show_filter)
                            
                            <p class="cattworks"><b>{{$show_filter->filter_name}}</b></p>
                            <div class="container">
                              <ul class="ks-cboxtags">
                                <?php $get_subfilters = DB::table('workplace_subfilters')->where('filter_id', $show_filter->filter_id)->get(); ?>
                                @foreach($get_subfilters as $show_subfilter)
                                    <li><input type="checkbox" name="subfilter_id[{{$show_filter->filter_id}}]" id="{{$show_subfilter->id}}" value="{{$show_subfilter->id}}"><label for="{{$show_subfilter->id}}"> {{$show_subfilter->sub_filtername}} </label></li>
                                @endforeach
                              </ul>

                            </div>
                        @endforeach
                    </div>

                    <b class="cattworks">Search Tags </b><hr/>
                    <div class="container">
                      <ul class="ks-cboxtags">
                        @foreach(explode(',', $get_job->search_tag) as $search_tag)
                            <li><label> {{$search_tag}} </label></li>
                        @endforeach
                      </ul>

                    </div>
                    
                </div><br/> 

                <div class="cattwork">
                    <b class="cattworks">Visibility </b><hr/>
                    
                    <b class="cattworks">Job Posting Visibility </b><br/>
                    <p>{{$get_job->number_freelancer}} number of freelancers</p>
                    
                </div><br/> 

                <div class="cattwork">
                    <b class="cattworks">Budget </b><hr/>

                    <span style="float: left; margin-right: 15%;">
                        <b class="cattworks">Project Type</b><br>
                        <p>{{$get_job->price_type}}</p>
                        </span>

                    <span style="float: left; margin-right: 15%;">
                        <b class="cattworks">Budget</b><br>
                        <p>${{$get_job->budget}}</p>
                    </span>

                    <span style="float: left; margin-right: 15%;">
                        <b class="cattworks"> @if($get_job->price_type == 'fixed') Project End Day @endif @if($get_job->price_type == 'monthly') Everyday Work Hours @endif</b><br>
                        <p>{{$get_job->day_hours}} @if($get_job->price_type == 'fixed') days @endif @if($get_job->price_type == 'monthly') Hours @endif </p>
                    </span>

                    <span style="float: left; margin-right: 15%;">
                        <b class="cattworks">Experience Level</b><br>
                        <p>{{$get_job->experience}}</p>
                    </span>
                    
                </div>


                <div class="downloadtheme5">
                    <a href="{{url('dashboard/workplace/job-post/'.$get_job->job_title_slug.'/step/6')}}" class="button mid tertiary half v3">Draf & Exit</a><br>
                    <button type="submit" class="button mid secondary wicon half  v3">Submit & Review</button><br>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- PACK BOXES -->
            <!-- /PACK BOXES -->
        </form>
            <div class="clearfix"></div>    
            

            <!-- FORM BOX ITEMS -->
            <!-- /FORM BOX ITEMS -->
        </div>
        <!-- DASHBOARD CONTENT -->
@endsection


