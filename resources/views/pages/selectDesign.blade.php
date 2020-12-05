@extends('layouts.common')

@section('title', 'BECCHU')

@section('main')
<div class="columns m-4 is-centered">
    <div class="column is-5 has-text-centered">
        <p class="subtitle">使用するデザインを選んでください</p>
    </div>
</div>
<div class="columns m-4 is-centered">
    <div class="column is-5 has-text-centered">
        <div class="tile is-ancestor">
            @foreach ($designs as $design)
                @if(( $loop->iteration ) % 3 === 1)
                    <div class="tile is-ancestor">
                @endif
                    <div class="tile is-parent">
                        <article class="tile is-child box is-paddingless">
                            <a href="{{ (request()->fullUrl()).'&design='.$design->uuid }}">
                                <div class="has-background-white">
                                    <p class="image">
                                        <img src="{{asset('/orignal/'. $design->file_path)}}">
                                    </p>
                                </div>
                                <p class="is-text-2 has-text-primary py-3">{{ $design->title}}</p>
                            </a>
                        </article>
                    </div>
                @if(( $loop->iteration ) % 3 === 0)
                    </div>
                @elseif ($loop->last)
                    @for ($i = $loop->count%3 ; $i < 3; $i++)
                        <div class="tile is-parent">
                            <article class="tile is-child has-background-primary box">
                                <p class="is-text-2">BECCHU</p>
                            </article>
                        </div>
                    @endfor
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection