
    <div class="span12">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header" style="text-align:center">
            <h4>{{$field}}</h4>
        

        </div>

        <div class="block-content collapse in">
            <div class="span12">
                <div class="well" style="margin-top:30px;">
                    <h4>{{$question->quiz}}</h4>
                    
                    @for($i = 0; $i < count($answer_array) - 1; $i++)
                            <button type="button" class="btn btn-large btn-block" id="answer{{$i + 1}}" style="text-align:left;padding-left:20px;padding-right:20px;">
                            {{$i + 1}}.{{$answer_array[$i]}}
                            @if(in_array(($i + 1), $right_answer_id))
                                <i class="icon-ok pull-right"></i>
                            @endif
                            </button>
                            @if(in_array(($i + 1), $your_answer_array))
                                <script>
                                    $('#answer{{$i + 1}}').css('margin-top',  "5px");
                                    $('#answer{{$i + 1}}').css('background-color',  "#d2d7a7");
                                    $('#answer{{$i + 1}}').css("background-image", "linear-gradient(to bottom,#d2d7a7,#d2d7a7)");
                                </script>
                            @endif
                    @endfor
                </div>
                <span id='current_num' style="display:none">{{$current_num}}</span>
                <span id='created_at' style="display:none">{{$created_at}}</span>
                <ul class="pager wizard pull-right">
                                                
                    <!-- <li class="next last" style=""><a href="javascript:void(0);" id="back">Back</a></li> -->
                    <li class="next last" style=""><a href="javascript:void(0);" id="next">Next</a></li>
                    <li class="next last" style=""><a href="javascript:void(0);" id="previous">Previous</a></li>
                    
                    
                </ul>

                
            </div>
        </div>
    </div>
    <!-- /block -->
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
        $('.btn.btn-large.btn-block').click(function(){
            if($(this).attr('id') == 0)
            {
                $(this).css('background-color',  "#d2d7a7");
                $(this).css("background-image", "linear-gradient(to bottom,#d2d7a7,#d2d7a7)");
                $(this).attr('id', '1');
            }
            else if($(this).attr('id') == 1)
            {
                $(this).css('background-color', "#e6e6e6");
                $(this).css("background-image", "linear-gradient(to bottom,#fff,#e6e6e6)");
                $(this).attr('id', '0');
            }
        });
        $('#answer').click(function(){
            $('#right_answer').show();
        });
        $('#next').click(function(){
                    event.preventDefault(); 
                    var created_at = $("#created_at").text();
                    var current_num = $("#current_num").text();


                    if({{$quiz_count}} == current_num) 
                    {
                        alert('It is last quiz.');
                        return;
                    }
                    $.ajax({type: "POST", url: "/view", data: {
                        'created_at' : created_at,
                        'current_num' : current_num / 1 + 1,
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                        }, success: function(result){
                            $('#maincontent').html(result);
                    }});
             
            
        });
        $('#previous').click(function(){
            
                    event.preventDefault(); 
                    var created_at = $("#created_at").text();
                    var current_num = $("#current_num").text();
                    if(current_num == 1) 
                    {
                        alert('It is first quiz.');
                        return;
                    }
                    $.ajax({type: "POST", url: "/view", data: {
                        'created_at' : created_at,
                        'current_num' : current_num / 1 - 1,
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                        }, success: function(result){
                            $('#maincontent').html(result);
                    }});
     
    
        });
        </script>
        
        