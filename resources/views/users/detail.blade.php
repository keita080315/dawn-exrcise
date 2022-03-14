@extends('layouts.login')

@section('content')


    <div>

            @csrf
            <table>
                <dt>ユーザー名</dt>
                <input value="{{$params['username']}}" name="username" type="text">

                <dt>自己紹介文</dt>
                <input value="{{$params['bio']}}" name="bio" type="text">

                <dt>アイコン</dt>
                <input value="{{$params['image']}}" name="image" type="text">
                <br>

            </table>

        <br>
        <a href="/top">ホームに戻る</a>

    </div>



@endsection
<script>export default {
    components: {App}
}
</script>
