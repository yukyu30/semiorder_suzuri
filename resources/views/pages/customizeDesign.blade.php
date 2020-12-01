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
        <div class="has-background-white m-3">
            <p class="image">
                <img src="{{asset('image/orignal/bakuro.png')}}">
            </p>
        </div>
        <form method="post" action="{{ url('/make') }}">
            <div class="field">
                {{ csrf_field() }}
                <label for="input_color">メインカラー</label>
                <div class="control">
                    <input type="color" id="input_color" name="input_color" value="">
                </div>
            </div>

            <input type="submit" name="make" class="button" value="これでつくる">

        </form>

    </div>
</div>
@endsection