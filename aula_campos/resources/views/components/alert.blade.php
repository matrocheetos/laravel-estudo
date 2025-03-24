@if (session()->has('success'))
    <p style="color: #086;">{{ session()->get('success') }}</p>
@endif

@if (session()->has('error'))
    <p style="color: #f00;">{{ session()->get('error') }}</p>
@endif

@if ($errors->any())
    <p style="color: #f00;">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </p>
@endif
