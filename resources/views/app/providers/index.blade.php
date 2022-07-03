<h3>Provider</h3>

{{-- Comentário --}}



@if (count($providers) > 0 && count($providers) < 10)
    <h5>You have clients</h5>
@elseif(count($providers) > 10)
    <h5>You have must clients</h5>
@else
    <h5>You no have clients</h5>
@endif


