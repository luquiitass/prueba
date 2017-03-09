<!DOCTYPE html>
<html>

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

@yield('content')

@section('scripts')
    @include('layouts.partials.scripts')
@show

</html>