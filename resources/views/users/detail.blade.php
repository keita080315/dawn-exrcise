@extends('layouts.login')

@section('content')


    <div class="row">

            @csrf
            <table>
                <dt>ユーザー名</dt>
                <dd  name="username" >{{$params['username']}}</dd>

                <dt>自己紹介文</dt>
                <dd  name="bio" >{{$params['bio']}}</dd>

                <dt>アイコン</dt>
                <dd name="image" >{{$params['images']}}</dd>
                <br>

            </table>

        <br>
        <a href="/top">ホームに戻る</a>

    </div>

    @if(!empty($exists))
        <a href="{{route('unfollow/{id}', ['id' => $exists['id']])}}">
            フォローをはずす
        </a>
    @else()
        <a href="{{route('follow/{id}', ['id' => $params['id']])}}">
            フォローする
        </a>
    @endif
@endsection
<script>export default {
    components: {App}
}
</script>
