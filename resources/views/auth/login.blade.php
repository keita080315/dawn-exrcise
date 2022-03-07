@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => 'login']) !!}

<p>DAWNSNSへようこそ</p>

{!! Form::label('e-mail')  !!}
{!! Form::input('text','mail',null,['class' => 'input'])  !!}
{!! Form::label('password')  !!}
{!! Form::input('password','password',null,['class' => 'input']) !!}

{!! Form::input('submit','send','ログイン')  !!}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
