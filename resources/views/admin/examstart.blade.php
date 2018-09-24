
<div class="span12">
    <!-- block -->
    <div class="block"  style="text-align:center">
        <div class="navbar navbar-inner block-header">

            
            <div class="muted pull-right"><span class="badge badge-info" id='current_num'>{{$quiz_number}}</span></div>
            <div id="timer"></div>
            
        </div>

        <div class="block-content collapse in">
            <div class="span12">
                <div class="well" style="margin-top:30px;">
                    <h4>{{$question->quiz}}</h4>
                    @for($i = 0; $i < count($answer_array) - 1; $i++)
                            <button type="button" class="btn btn-large btn-block answer{{($i + 1)}}" id="0" style="text-align:left;padding-left:20px;padding-right:20px;">
                            {{$i + 1}}.{{$answer_array[$i]}}
                    @endfor
                </div>
                <button class="btn btn-success pull-right" id="next">Next</button>

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
        $('#next').click(function(){
            var current_num = $('#current_num').text() / 1;
            var answer = '';
            event.preventDefault();
            for(var i = 0; i < {{count($answer_array)}}; i++)
            {
                if($('.answer'+ (i + 1)).attr('id') == 1)
                {
                    answer += (i + 1);
                    answer += ',';
                }
            }

            $.ajax({type: "POST", url: "/examnext", data: 
                {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'answer' : answer,
                    'current_num' : current_num
                }, 
                success: function(result){
                    $('#maincontent').html(result);
                }
            });
        });
        function timer(){
            $('#timer').text("Left Time {{$time}} : 00");
            var left_time = {{$time}} * 60;
            var timer = setInterval(function(){
                left_time--;
                if(left_time == 0) 
                {
                    alert('Time is up. Take next quiz please.');
                    var current_num = $('#current_num').text() / 1;
                    var answer = '';
                    for(var i = 0; i < {{count($answer_array)}}; i++)
                    {
                        if($('.answer'+ (i + 1)).attr('id') == 1)
                        {
                            answer += (i + 1);
                            answer += ',';
                        }
                    }
                    $.ajax({type: "POST", url: "/examnext", data: 
                        {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'answer' : answer,
                        'current_num' : current_num
                        }, 
                        success: function(result)
                        {
                            $('#maincontent').html(result);
                        }
                    });
                }
                var min = parseInt(left_time / 60);
                var sec = left_time % 60;
                $('#timer').text("Left Time " + min + " : " + sec);
                
            }, 1000);

        }
        timer();
        </script>
        
       




