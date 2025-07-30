@if(session('status'))
<meta name="flash-status" content="{{ session('status') }}">
@endif

@if(session('error'))
<meta name="flash-error" content="{{ session('error') }}">
@endif
