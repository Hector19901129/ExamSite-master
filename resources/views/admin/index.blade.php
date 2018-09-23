@extends('layouts.main')


@section('head')
   @include('includes.head')
@endsection

@section('maincontent')
    @parent
        <div class="span2"></div>
        <div class="span4">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header users">
                        <div class="span6">
                                <div class=" muted pull-left"></div><span class="big">1,23  </span>
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
                                    <div class=" muted pull-left"></div><span class="big">1,234</span>
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
    </div>
    <div class="span2"></div>
    <div class="row-fluid">

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
                            <tr>
                                <td>1</td>
                                <td>Mark Otto</td>
                                <td>1 hour ago</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob Thornton</td>
                                <td>10 hours ago</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Vincent Gabriel</td>
                                <td>2 days ago</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="block-content collapse in"  style="text-align:center">
                    <a href="#">View All Students</a>
                </div>
            </div>
            <!-- /block -->
        </div>
@endsection

@section('js')
        <script src="{{asset('vendors/jquery-1.9.1.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('vendors/datatables/js/jquery.dataTables.min.js')}}"></script>


        <script src="{{asset('scripts.js')}}"></script>
        <script src="{{asset('DT_bootstrap.js')}}"></script>
        <script>
            $(function() {
                
            });
        </script>
@endsection