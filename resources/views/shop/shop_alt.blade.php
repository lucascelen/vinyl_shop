@extends('layouts.template')

@section('title', 'Shop')

@section('main')
    <h1>Shop - alternative listing</h1>

    @foreach($genres as $genre)
        <h2>{{$genre->name}}</h2>
        <ul>
            @foreach($records as $record)
                @if($record->genre_id == $genre->id)
                    <li><a href="#shop/{{ $record->id }}" data-id="{{ $record->id }}">{{ $record->artist }} - {{$record->title }} |
                            Stock: {{ $record->stock }}</li>
                @endif
            @endforeach
        </ul>
    @endforeach
@endsection

@section('script_after')
    <script>
        $(function() {
            $('a').click(function () {
                record_id = $(this).data('id');
                $(location).attr('href', /shop/${record_id} );
            });
        })
    </script>
@endsection
