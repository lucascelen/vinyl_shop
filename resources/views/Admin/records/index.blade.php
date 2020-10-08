
<h1>Records</h1>

<ul>

{{--    //foreach ($records as $record){--}}
{{--        //echo "<li> $record </li>";--}}
{{--        //echo '<li>' . $record . '</li>';--}}
{{--   //}--}}
        @foreach ($records as $record)
            <li>{!! $record !!}</li>
        @endforeach
</ul>



