@extends('layouts.main')


@section('head')
   @include('includes.head')
@endsection
@section('header')
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                @if($role_id == 1)
                <a class="brand" href="#">Admin Dashboard</a>
                @else
                <a class="brand" href="#">User Dashboard</a>
                @endif
                <div class="nav-collapse collapse">
                    <ul class="nav pull-right">
                        <li class="dropdown">
                            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> {{$name}} <i class="caret"></i>

                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a tabindex="-1" id = "logout">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav">
                        
                        <li class="">
                            <a href="#" >Settings 

                            </a>

                        </li>
                        
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
@endsection
@section('maincontent')
    @if($role_id == 1)
        <div class="row-fluid">
                <div class="span2"></div>
                <div class="span4">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header users">
                                <div class="span6">
                                        <div class=" muted pull-left"></div><span class="big">{{$users_count}}</span>
                                        <div style="color:white">Total Students </div>
                                </div>
                                <div class="span6">
                                        <i class="fa fa-user-plus pull-right" style="font-size:50px;margin-top:40px;opacity:50%"></i>
                                </div>
                                

                            
                        </div>
                        <div class="students"><a href="#" style="color:white;">more-info &nbsp;<i class="fa fa-arrow-circle-o-right"></i></a></div>
                    </div>
                    <!-- /block -->
                </div>
                <div class="span4">
                    <!-- block -->
                    <div class="block">
                            <div class="navbar navbar-inner block-header questions">
                                    <div class="span6">
                                            <div class=" muted pull-left"></div><span class="big">{{$questions_count}}</span>
                                            <div style="color:white">Total Questions </div>
                                    </div>
                                    <div class="span6">
                                            <i class="fa fa-question-circle-o pull-right" style="font-size:50px;margin-top:40px;opacity:50%"></i>
                                    </div>
                                    

                                
                            </div>
                            <div class="questions-info"><a href="#" style="color:white;">more-info &nbsp;<i class="fa fa-arrow-circle-o-right"></i></a></div>
                        </div>
                    <!-- /block -->
                </div>
            
            <div class="span2"></div>
        </div>
        <div class="row-fluid">
                <div class="span2"></div>
                <div class="span8">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">Latest Students</div>
                            <div class="pull-right"><span class="badge badge-info">17</span>

                            </div>
                        </div>
                        <div class="block-content collapse in">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:20%;">#</th>
                                        <th style="width:40%;"> Name</th>
                                        <th style="width:40%;"> Date </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recent_users as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="block-content collapse in"  style="text-align:center">
                            <a href="#">View All Students</a>
                        </div>
                    </div>
                    <div class="span2"></div>
                    <!-- /block -->
                </div>
        </div>
    @else

        <div class="row-fluid">
                <div class="span2"></div>
                <div class="span4">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header users">
                                <div class="span6">
                                        <div class=" muted pull-left"></div><span class="big">{{$total_score}}</span>
                                        <div style="color:white">Average Score </div>
                                </div>
                                <div class="span6">
                                        <i class="fa fa-leanpub pull-right" style="font-size:50px;margin-top:40px;opacity:50%"></i>
                                </div>
                                

                            
                        </div>
                        <div class="students"><a href="#" style="color:white;">more-info &nbsp;<i class="fa fa-arrow-circle-o-right"></i></a></div>
                    </div>
                    <!-- /block -->
                </div>
                <div class="span4">
                    <!-- block -->
                    <div class="block">
                            <div class="navbar navbar-inner block-header questions">
                                    <div class="span6">
                                            <div class=" muted pull-left"></div><span class="big">{{$exam_count}}</span>
                                            <div style="color:white">Total Exam </div>
                                    </div>
                                    <div class="span6">
                                            <i class="fa fa-pencil-square-o pull-right" style="font-size:50px;margin-top:40px;opacity:50%"></i>
                                    </div>
                                    

                                
                            </div>
                            <div class="questions-info"><a href="#" style="color:white;">more-info &nbsp;<i class="fa fa-arrow-circle-o-right"></i></a></div>
                        </div>
                    <!-- /block -->
                </div>
            
            <div class="span2"></div>
        </div>
        <div class="row-fluid">
                <div class="span2"></div>
                <div class="span8">
                    <!-- block -->
                    <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Latest Reports</div>
                    <div class="pull-right"><span class="badge badge-info">{{$reports_count}}</span>

                    </div>
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th style="width:10%">No</th>
                            <th style="width:20%">Score</th>
                            <th style="width:20%">Question Count</th>
                            <th style="width:30%">Date and Time</th>
                            <th style="width:20%">Issue</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 0; $i < count($reports); $i++)
                                <tr class="odd gradeX">
                                    <td class="center">{{$i + 1}}</td>
                                    <td class="center">{{$reports[$i]->aver_score}}</td>
                                    <td class="center">{{$reports[$i]->quiz_count}}</td>
                                    <td class="center">{{$reports[$i]->created_at}}</td>
                                    <td class="center">
                                        @if($reports[$i]->not_finished == true)
                                            Not completed
                                        @endif
                                    </td>
                                    
                                </tr>
                            @endfor
                            
                        </tbody>
                    </table>
                </div>
                <div class="block-content collapse in"  style="text-align:center">
                    <a href="#">View All Students</a>
                </div>
            </div>
                    <div class="span2"></div>
                    <!-- /block -->
                </div>
        </div>
    @endif
@endsection

@section('js')
        <link href="{{asset('vendors/datepicker.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('vendors/uniform.default.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('vendors/chosen.min.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('vendors/wysiwyg/bootstrap-wysihtml5.css')}}" rel="stylesheet" media="screen">
        <script src="{{asset('vendors/jquery-1.9.1.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('vendors/datatables/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendors/easypiechart/jquery.easy-pie-chart.js')}}"></script>
        <script src="{{asset('scripts.js')}}"></script>
        <script src="{{asset('DT_bootstrap.js')}}"></script>
        

  
        <script src="{{asset('vendors/jquery.uniform.min.js')}}"></script>
        <script src="{{asset('vendors/chosen.jquery.min.js')}}"></script>
        <script src="{{asset('vendors/bootstrap-datepicker.js')}}"></script>

        <script src="{{asset('vendors/wysiwyg/wysihtml5-0.3.0.js')}}"></script>
        <script src="{{asset('vendors/wysiwyg/bootstrap-wysihtml5.js')}}"></script>
        <script src="{{asset('vendors/wizard/jquery.bootstrap.wizard.min.js')}}"></script>

        <script type="text/javascript" src="{{asset('vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
        <script src="{{ asset('form-validation.js')}}"></script>
        <script>

        jQuery(document).ready(function() {   
        FormValidation.init();
        });
	

        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
        
        <script>
            $(function() {
                // Easy pie charts
                $('.chart').easyPieChart({animate: 1000});
            });
            $('#logout').click(function(){

                    $.ajax({url: "/logout", success: function(result){
                        location.replace('/login');
                    }});
             
            });
            $('#admindashboard').click(function(){
                    $("li.active").removeClass("active");
                    $(this).parent("li").addClass("active");
                    $('#taskbar').text("Dashboard");
                    event.preventDefault();
                    $.ajax({
                        type: "POST", 
                        url: "/admindashboard", 
                        data: {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function(result){
                        $('#maincontent').html(result);
                    }});
             
            });
            $('#adminstudents').click(function(){
                    $("li.active").removeClass('active');
                    $(this).closest('li').addClass('active');
                    $('#taskbar').text("Students");
                    event.preventDefault();
                    $.ajax({
                        type: "POST", 
                        url: '/adminstudents', 
                        data: {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success: function(result){
                            $('#maincontent').html(result);
                        }
                    });
             
            }); 
            $('#adminquestions').click(function(){
                $("li.active").removeClass('active');
                    $(this).closest('li').addClass('active');
                    $('#taskbar').text("Questions");
                    event.preventDefault();
                    $.ajax({type: "POST", data: {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                        }, url: "/adminquestions", success: function(result){
                        $('#maincontent').html(result);
                    }});
             
            });
            $('#userdashboard').click(function(){
                $("li.active").removeClass('active');
                    $(this).closest('li').addClass('active');
                    $('#taskbar').text("Dashboard");
                    event.preventDefault();
                    $.ajax({type: "POST", url: "/userdashboard", data: {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                        }, success: function(result){
                        $('#maincontent').html(result);
                    }});
             
            });
            $('#exam').click(function(){
                $("li.active").removeClass('active');
                    $(this).closest('li').addClass('active');
                    $('#taskbar').text("Exam");
                    event.preventDefault();
                    $.ajax({type: "POST", url: "/exam", data: {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                        }, success: function(result){
                        $('#maincontent').html(result);
                    }});
             
            });
            $('#training').click(function(){
                $("li.active").removeClass('active');
                    $(this).closest('li').addClass('active');
                    $('#taskbar').text("Train");
                    event.preventDefault();
                    $.ajax({type: "POST", url: "/training", data: {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                        }, success: function(result){
                        $('#maincontent').html(result);
                    }});
             
            });
            $('#reports').click(function(){
                $("li.active").removeClass('active');
                    $(this).closest('li').addClass('active');
                    $('#taskbar').text("Report");
                    event.preventDefault(); 
                    $.ajax({type: "POST", url: "/reports", data: {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                        }, success: function(result){
                        $('#maincontent').html(result);
                    }});
             
            });
        </script>
@endsection