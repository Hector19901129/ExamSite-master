@extends('layouts.main')

@section('head')
        <title>Tables</title>
        <!-- Bootstrap -->
        <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('styles.css')}}" rel="stylesheet" media="screen">
        <link href="{{asset('DT_bootstrap.css')}}" rel="stylesheet" media="screen">
        <script src="{{asset('vendors/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>
        
@endsection

@section('maincontent')
    @parent
    <div class="span12">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header" style="text-align:center">
            <h4>Biology</h4>
        

        </div>

        <div class="block-content collapse in">
            <div class="span12">
                <div class="well" style="margin-top:30px;">
                    <h4>Please choose right answers. </h4>

                   
                    <button type="button" class="btn btn-large btn-block">Click Right answer1</button>
                    <button type="button" class="btn btn-large btn-block">Click Right answer1</button>
                    <button type="button" class="btn btn-large btn-block">Click Right answer1</button>
                    <button type="button" class="btn btn-large btn-block">Click Right answer1</button>
                    <button type="button" class="btn btn-large btn-block">Click Right answer1</button>
                </div>
                <button class="btn btn-success pull-right">Next</button>

                <button class="btn btn-primary pull-right" style="margin-right:20px">Answer</button>
            </div>
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