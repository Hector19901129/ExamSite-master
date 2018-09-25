

                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">You had taken exams {{$exam_count}} times!. You total score is {{$total_score}}</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   
                                    
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr> 
                                                <th style="width:10%">No</th>
                                                <th style="width:15%">Score</th>
                                                <th style="width:15%">Question Count</th>
                                                <th style="width:30%">Date and Time</th>
                                                <th style="width:20%">Issue</th>
                                                <th style="width:10%">View</th>
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
                                                <td class="center"><button class="btn btn-success pull-right" id="{{$reports[$i]->created_at}}" style="width:100%">View</button></td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->


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

        $('.btn.btn-success').click(function(){
            var created_at = $(this).attr('id');
            var current_num = 1;
            event.preventDefault();
            $.ajax({type: "POST", url: "/view", data: {
                    'created_at' : created_at,
                    'current_num' : current_num,
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                }, success: function(result){
                    $('#maincontent').html(result);
            }});
        });
        </script>
        
        