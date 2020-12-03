@extends('layouts.common')

@section('title', 'BECCHU')

@section('main')
<div class="columns m-4 is-centered">
    <div class="column is-5 has-text-centered">
        <p class="subtitle">仕上がりイメージ</p>
        <p>素敵なお召し物ができましたね！！</p>
    </div>
</div>
<div class="columns m-4 is-centered ">
    <div class="column is-5 has-text-centered">
        <p class="image is-1by1">
            <img src="{{SuzuriAPI::replaceItemImageUrl($result['products'][0]['imageUrl'], array(
                    'image'=> array(
                        'size' => 765,
                    ),
                    'item' => array(
                        'size' => 'm',
                        'color' => 'white',
                        'angle' => '/front',
                    ),
                )
            )}}">
        </p>
    </div>
</div>
<div class="columns m-4 is-centered is-row-reverse">
    <div class="column is-1 has-text-centered">
        <a href="{{ $result['products'][0]['sampleUrl'] }}"> <button class="button">詳細確認(SUZURIへ移動)</button></a>
    </div>
    <div class="column is-1 has-text-centered">
        <a href="create"><button class="button is-primary is-outlined">新しく作る</button></a>
    </div>
</div>
@endsection
