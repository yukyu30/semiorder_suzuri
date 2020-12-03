@extends('layouts.common')

@section('title', 'BECCHU')

@section('main')
<div class="columns m-4 is-centered">
    <div class="column is-5 has-text-centered">
        <p class="subtitle">作成したいアイテムを選んでください
    </div>
</div>
<div class="columns m-4 is-centered">
    <div class="column is-5 has-text-centered">
        <div class="tile is-ancestor">
            @foreach ($items as $item)
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <a href="{{ url('/create?item='. $item->id) }}">
                            <p class="image is-1by1">
                                <img src="{{asset('/icon/'. $item->icon_path)}}">
                            </p>
                            <p class="is-text-2 has-text-primary pt-3">{{ $item->humanize_name }}</p>
                        </a>
                    </article>   
                </div>
            @endforeach
            <div class="tile is-parent">
                <article class="tile is-child has-background-primary box">
                    <p class="is-text-2">Coming soon...</p>
                </article>     
            </div>
            <div class="tile is-parent">
                <article class="tile is-child has-background-primary box">
                    <p class="is-text-2">現在はTシャツのみです</p>
                </article>     
            </div>
        </div>
    </div>
</div>
@endsection
