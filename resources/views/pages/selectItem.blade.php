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
            @foreach ($items as $item)
                @if(( $loop->iteration ) % 3 === 1)
                    <div class="tile is-ancestor">
                @endif
                <div class="tile is-parent">
                    <article class="tile is-child box is-paddingless">
                        <a href="{{ url('/create?item='. $item->id) }}">
                            <p class="image is-1by1">
                                <img src="{{asset('/icon/'. $item->icon_path)}}">
                            </p>
                            <p class="is-text-2 has-text-primary pt-3">{{ $item->humanize_name }}</p>
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
@endsection
