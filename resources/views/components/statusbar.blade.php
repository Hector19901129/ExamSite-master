
@if (isset($rest))
<div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Activate now!</h4>
    {{$rest}} days left for free trial.
</div>
@endif