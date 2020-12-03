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
                <img src="{{asset('/orignal/' . $design->file_path)}}">
            </p>
        </div>
    </div>
</div>
<div class="columns is-centered">
    <div class="column is-2 has-text-centered">
        <form method="GET" action="{{ url('/make') }}">
            <div class="field is-horizontal">
                <div>
                    <label class="label has-text-primary">メインカラー</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input id="custom" name="input_color" value="">
                            <script type="text/javascript" src="{{ asset('js/colorpicker.js') }}"></script>
                        </div>
                    </div>
                    <input type="hidden" name="design" value={{$design->uuid}}>
                    <input type="hidden" name="item" value={{$item->id}}>
                </div>
            </div>
            <input type="submit" name="make" class="button" value="これでつくる">
        </form>
    </div>
</div>

@endsection