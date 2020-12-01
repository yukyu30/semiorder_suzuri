@extends('layouts.common')

@section('title', 'BECCHU')

@section('main')
<div class="columns m-4 is-centered">
    <div class="column is-5 has-text-centered">
        <p class="subtitle">作成完了</p>
    </div>
</div>
<div class="columns m-4 is-centered">
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
        </p><br>
        
        <a href="{{ $result['products'][0]['sampleUrl'] }}"> <button class="button">詳細確認(SUZURIへ移動)</button></a>
        
    </div>
</div>
@endsection
