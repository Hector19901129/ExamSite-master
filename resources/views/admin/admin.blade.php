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
                            <div class="pull-right"><span class="badge badge-info">{{$user_count}}</span>

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
        <script src="{{asset('vendors/jquery-1.9.1.js')}}"></script>
        <!-- <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script> -->
        <script src="{{asset('vendors/datatables/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendors/easypiechart/jquery.easy-pie-chart.js')}}"></script>
        <script src="{{asset('scripts.js')}}"></script>
        <script src="{{asset('DT_bootstrap.js')}}"></script>
        <link href="{{asset('vendors/datepicker.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('vendors/uniform.default.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('vendors/chosen.min.css')}}" rel="stylesheet" media="screen">

        <link href="{{asset('vendors/wysiwyg/bootstrap-wysihtml5.css')}}" rel="stylesheet" media="screen">
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
        
        
