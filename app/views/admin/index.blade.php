@extends('master')
@section('content')

<div class="span8 well">

    <h4>Hello, {{ Auth::user()->username }} [ {{Auth::user()->email}} ]</h4>

</div>


@stop