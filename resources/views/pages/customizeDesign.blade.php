@extends('layouts.common')

@section('title', 'BECCHU')

@section('main')
<div class="columns m-4 is-centered">
    <div class="column is-5 has-text-centered">
        <p class="subtitle">色をカスタマイズしてください</p>
    </div>
</div>
<div class="columns m-4 is-centered">
    <div class="column is-5 has-text-centered">
    
    </div>
</div>
<div class="columns m-4 is-centered">
    <div class="column is-5 has-text-centered">
        <a href="{{ url('/make') }}"> <button class="button">これで作成する</button></a> 
    </div>
</div>
@endsection
