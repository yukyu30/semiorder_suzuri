@extends('layouts.common')

@section('title', 'BECCHU')

@section('main')
<div class="columns m-4 is-centered">
    <div class="column is-8">
        <div class="tile is-ancestor">
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <h1 class="title has-text-centered">BECCHUとは</h1>
                    <p>登録されたデザインをもとにオリジナル配色のアイテムを作成、購入できるサイトです</P>
                </article>        
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <h1 class="title has-text-centered">作成できるアイテム</h1>
                    <p>
                        現在作成できるアイテムはTシャツのみです
                    </p>
                </article>        
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <h1 class="title has-text-centered">オーダーの手順</h1>
                    <div class="content">
                        <ul>
                            <li>作成するアイテムを選択</li>
                            <li>印刷したいデザインを選択</li>
                            <li>色を選択</li>
                            <li>完成イメージが表示されます</li>
                            <li>購入する場合は、詳細確認ボタンをクリック</li>
                        </ul>
                    </div>
                </article>        
            </div>
        </div>
    </div>
</div>
<div class="columns m-4 is-centered">
    <div class="column is-8">
        <div class="box has-text-centered">
            <h1 class="title">作成を始める</h1>
            <p><a>利用規約を確認する(未整備)</a></p><br>
            <p>本ウェブサイトのご利用に起因するソフトウェア，ハードウェア上の事故および不具合，その他損害について責任を負いません</p>
            <p>当サイトはSUZURI APIを利用して作成されており、SUZURI非公式のサイトとなっています</p><br>
            <a href="{{ url('/create') }}"> <button class="button">利用規約に同意して作成を始める</button></a>
        </div>        
    </div>
</div>
@endsection
