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
            <div class="tile is-parent">
                <article class="tile is-child box is-paddingless">
                    <a href="{{ (request()->fullUrl()).'&designId=1' }}">
                        <div class="has-background-white">
                            <p class="image">
                                <img src="{{asset('image/orignal/bakuro.png')}}">
                            </p>
                        </div>
                        <p class="is-text-2 has-text-primary py-3">馬喰電機</p>
                        
                    </a>
                </article>     
            </div>
            <div class="tile is-parent">
                <article class="tile is-child has-background-primary box is-paddingless">
                    <p class="is-text-2 py-3">Coming soon...</p>
                </article>     
            </div>
            <div class="tile is-parent">
                <article class="tile is-child has-background-primary box is-paddingless">
                    <p class="is-text-2 py-3">現在はTシャツのみです</p>
                </article>     
            </div>
        </div>
    </div>
</div>
@endsection
