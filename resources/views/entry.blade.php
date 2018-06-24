@extends('template.header')
@section('title', '自分が書かなければおそらく誰かが書く日記')
<style>
.form {
    font-size: 100%;
    text-align: center;
    width: 100%;
    margin: 1.5em;
}
.form>p {
    font-size: 250%;
    font-weight: bold;
}
#entry {
    text-align: left;
    width: 100%;
    height: 40%;
}
.links {
    text-align: right;
}
.links>a {
    padding: 0 0.5em;
}
</style>
@section('content')
<div class="form">
    <p>{{ $date }}</p>
    <div id="entry">ここに記事が入ります</div>
    <div class="links">
        <a href="/edit">edit</a>
        <a href="/about">about</a>
    </div>
</div>
@endsection
