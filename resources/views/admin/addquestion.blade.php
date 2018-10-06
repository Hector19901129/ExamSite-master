
<div class="span12">
    <!-- block -->
    <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Question</div>
                                <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle" id="field">Chemistry <span class="caret"></span></button>
                                         <ul class="dropdown-menu" id="field_list">
                                            <li><a href="" id="Chemistry">Chemistry</a></li>
                                            <li><a href="" id="Biology">Biology</a></li>
                                         </ul>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div id="rootwizard">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">
                                               <form class="form-horizontal">
                                                  <fieldset id="question">
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Title</label>
                                                      <div class="controls">
                                                      <textarea name="title" style="width:73%" rows="5" id = "title"></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Answer <span id="answer_num"> 1 </span></label>
                                                      <div class="controls">
                                                        <input class="input-xlarge focused" id="answer1" type="text" value="" style="height:30px;width:73%">
                                                        <input type="checkbox" style="margin-left: 10px;" id="checkbox1">
                                                      </div>
                                                    </div>
                                                    
                                                  </fieldset>
                                                </form>
                                            </div>
                                          
                                            
                                            <ul class="pager wizard pull-right">
                                                
                                                <!-- <li class="next last" style=""><a href="javascript:void(0);" id="back">Back</a></li> -->
                                                
                                                
                                                <li class="next last" style=""><a href="javascript:void(0);" id="addAnswer">Answer + </a></li>
                                                
                                                <li class="next last" style=""><a href="javascript:void(0);" id="subAnswer">Answer - </a></li>

                                                <li class="next"><a href="" id="save">Save</a></li>

                                                
                                            </ul>
                                        </div>  
                                    </div>
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
            var answer_num = 1;
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
            $('ul#field_list li a').click(function() {
                event.preventDefault();
                
                $('#field').html($(this).attr('id') + "<span style = 'margin-left:4px' class='caret'></span>");
            });

            $('#addAnswer').click(function() {
                event.preventDefault();
                answer_num++;
                $('#question').append('<div class="control-group">'+
                '<label class="control-label" for="focusedInput">Answer <span>'+ answer_num +' </span></label>'+
                '<div class="controls"><input class="input-xlarge focused" id="answer'+ answer_num +'" type="text" value="" style="height:30px;width:73%">'+
                '<input type="checkbox" style="margin-left: 15px;" id="checkbox'+ answer_num +'"></div></div>');

            });

            $('#subAnswer').click(function() {
                event.preventDefault();
                if(answer_num != 1)
                {
                    answer_num--;
                
                    $("#question div.control-group").last().remove();
                }
                
                
            });
            
            $('#save').click(function() {

                event.preventDefault();
                var answer = "";
                var right_answer_num = "";
                var multi_option = false;

                if( $('#title').val() == ""){
                    alert('Input title!')
                    return;
                }
                for(var i = 0; i < answer_num; i++){
                    if($('#answer'+(i + 1)).val() == ""){
                        alert('Input Answer'+ (i + 1));
                        return;
                    }
                    answer += $('#answer'+(i + 1)).val();
                    
                    answer += "\\\\";
                    if($('#checkbox'+(i + 1)).is(':checked'))
                    {
                        right_answer_num += (i + 1);
                        right_answer_num += ",";
                    }
                }
                var data = {'_token': $('meta[name="csrf-token"]').attr('content'), 
                            'field': $('#field').text(),
                            'title': $('#title').val(),
                            'answer': answer,
                            'right_answer_num': right_answer_num,
                            'multi_option': right_answer_num.split(',').length > 2 ? true:false,


                }
                $.ajax({type: "POST", url: "/addquestion", data: data, success: function(result){
                        alert("Added a question successfully!");
                        $("#title").val("");
                        for(var i = 0; i < answer_num; i++){
                            $('#answer'+(i + 1)).val("");
                        }
                }});
                
            });
        </script>
        
        