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
            @foreach($designs as $design)
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
            @endforeach
            <div class="tile is-parent">
                <article class="tile is-child has-background-primary box is-paddingless">
                    <p class="is-text-2 py-3">Coming soon...</p>
                </article>     
            </div>
            <div class="tile is-parent">
                <article class="tile is-child has-background-primary box is-paddingless">
                    <p class="is-text-2 py-3">現在は1種類のみです</p>
                </article>     
            </div>
        </div>
    </div>
</div>
@endsection
