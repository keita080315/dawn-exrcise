@extends('layouts.login')

@section('content')

    @if($if == 1)
    <div>
        <form method="post" action="{{ route('modify_content') }}">
            @csrf
            <table>
                <dt>ユーザー名</dt>
                <input value="{{$user['username']}}" name="username" type="text">

                <dt>自己紹介文</dt>
                <input value="{{$user['bio']}}" name="bio" type="text">

                <dt>アイコン</dt>
                <input value="{{$user['image']}}" name="image" type="text">
                <br>
                <button type="submit">反映する</button>
            </table>
        </form>
        <br>
        <a href="/top">ホームに戻る</a>

    </div>

@else
    <div>
        <form action="{{ route('update_content') }}" method="get" name="modify">
            @csrf
            <table>
                <dt>ユーザー名</dt>
                <dd>{{$user['username']}}</dd>

                <dt>メールアドレス</dt>
                <dd>{{$user['email']}}</dd>

                <dt>自己紹介文</dt>
                <dd>{{$user['bio']}}</dd>

                <dt>アイコン</dt>
                <dd>{{$user['image']}}</dd>
                <br>
                <button  type="submit" >修正する</button>

            </table>
        </form>
        <br>
        <a href="/top">ホームに戻る</a>
    </div>


@endif

@endsection
<script>export default {
    components: {App}
}
</script>
