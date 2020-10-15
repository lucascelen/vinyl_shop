
@extends('layouts.template')

<body>
{{--  Navigation  --}}
<main class="container mt-3">
    @section('title', 'Records')

    @section('main')
        <h1>Records</h1>
        <ul>
            @foreach ($records as $record)
                <li>{!! $record !!}</li>
            @endforeach
        </ul>
    @endsection
{{--    //foreach ($records as $record){--}}
{{--        //echo "<li> $record </li>";--}}
{{--        //echo '<li>' . $record . '</li>';--}}
{{--   //}--}}

</main>
</body>



