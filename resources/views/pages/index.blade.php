@extends('layouts.common')

@section('title', 'セミオーダー')

@section('main')
<div class="tile is-ancestor m-4">
    <div class="tile is-parent">
        <div class="box">
            <h1 class="title">BECCHUとは</h1>
            <p>登録されたデザインをもとに、オリジナル配色のアイテムを作成し、購入できるサイトです。</P>
        </div>        
    </div>
    <div class="tile is-parent">
        <div class="box">
            <h1 class="title">作成できるアイテム</h1>
            <p>
                Tシャツ、パーカー、スウェットなどのファッションアイテムから、スマホケース、マグカップも作成できます。<br>
                現在作成できるアイテムはロングスリーブTシャツのみです
            </p>
        </div>        
    </div>
    <div class="tile is-parent">
        <div class="box">
            <h1 class="title">なぜ作成できるの?</h1>
            <p>
                デザイン作成をこのサイトで行い、アイテムの購入から配送を<a class="has-text-weight-bold" herf="https://suzuri.jp/">SUZURI</a>を利用して行って
                るため作成することができます。
            </p>
        </div>        
    </div>
</div>
<div class="columns m-4">
    <div class="column my-2">
        <div class="box has-text-centered">
            <h1 class="title">作成を始める</h1>
            <p><a>利用規約を確認する(未整備)</a></p><br>
            <button class="button">利用規約に同意して作成を始める</button>
        </div>        
    </div>
</div>
@endsection