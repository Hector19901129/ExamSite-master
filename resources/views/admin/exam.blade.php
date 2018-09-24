
<div class="span12">
    <!-- block -->
    <div class="block"  style="text-align:center">
        <div class="navbar navbar-inner block-header">

            
            
            <div>Click start button to take exam.</div>
            
        </div>

        <div class="block-content collapse in">
            <div class="span12">
                <div class="well" style="margin-top:30px;">
                    <h3>Total count of quiz : {{$quiz_count}}(Chemistry:{{$quiz_count/2}}, Biology:{{$quiz_count/2}}) </h4>

                    <h3>Time per quiz :  {{$time}} min</h4>
                    <h4>Total time : {{$time * $quiz_count}} min</h4>
                </div>
                <button class="btn btn-success pull-right" id="start">Start Exam</button>
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
        $('#start').click(function(){
            event.preventDefault();
            $.ajax({type: "POST", url: "/startexam", data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                }, success: function(result){
                $('#maincontent').html(result);
            }});
        });
        </script>
        
       




