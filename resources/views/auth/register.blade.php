@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => 'register']) !!}

<h2>新規ユーザー登録</h2>

{!! Form::label('ユーザー名') !!}

{!! Form::input('text','username',null,['class' => 'input'])  !!}
{!! Form::label('メールアドレス')  !!}
{!! Form::input('text','mail',null,['class' => 'input']) !!}
{!! Form::label('パスワード')  !!}
{!! Form::input('password','password',null,['class' => 'input'])  !!}
{!! Form::label('パスワード確認')  !!}
{!! Form::input('text','password',null,['class' => 'input']) !!}

{!! Form::input('submit','send','登録')  !!}
<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
