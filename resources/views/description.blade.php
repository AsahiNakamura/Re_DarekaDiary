@extends('template.header')
@section('title', '自分が書かなければおそらく誰かが書く日記')
<style>
.info {
    color: red;
    font-weight: bold;
    font-size: 200%;
    background-color: #f5d2858c;
    text-align: center;
}
</style>
@section('content')
    <h1>これはなにか</h1>
    <p class="info">TODO:文章を書き換える。</p>
    <p>「自分が書かなければおそらく誰かが書く日記」</p>
    <p>ここでは日記をつけることができます．しかしその日記は日付がかわるその瞬間までインターネットにアクセスできるすべての存在(それは人間とも限りません)が書くことができます．</p>
    <p>どこかの誰か(重ねていいますがそれは人間とは限りません)が書き残したものを跡形もなく消し去って，今まさにテクストエリアにフォーカスを持っている存在のその瞬間を記録することができます．どんな美しい言葉でさえも今という瞬間に存在する言葉を超えることはできないのです．</p>
    <p>たとえそれがどんなに汚ない言葉でも例外はありません．</p>
    <p>日付を越えるという経験をした言葉は(スーパーユーザではない限り)2度と手をいれることのできない存在になります．</p>
    <div class="right">
        <a href="/">Top</a>
    </div>
@endsection
