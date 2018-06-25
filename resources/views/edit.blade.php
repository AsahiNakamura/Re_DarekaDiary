@extends('template.header')
@section('title', 'Re: 誰かダイアリー')
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
.button {
    border-radius: 5px;
}
.button:active{
    transform: translateY(2px);
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
.submit {
    margin-top: 0.5em;
}
</style>
@section('content')
<div class="form">
    <p>{{ $date }}</p>
        @if(count($data) > 0)
            <form action="/update" method="get">
                @foreach ($data as $value)
                    <textarea name="entry" id="entry" cols="30" rows="10">{{ $value->entry }}</textarea>
                @endforeach
        @else
            <form action="/entry" method="get">
                <textarea name="entry" id="entry" cols="30" rows="10"></textarea>
        @endif
        <div class="links submit">
            <button class="button" type="submit">記録</button>
            <a href="/about">about</a>
        </div>
    </form>
</div>
@endsection
