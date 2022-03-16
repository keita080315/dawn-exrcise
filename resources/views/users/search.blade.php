@extends('layouts.login')

@section('content')
    <form method="POST" action="{{ route('search_mode') }}">
        @csrf
        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('検索フォーム') }}</label>
        <input type="input" name="search" required>
        <button type="submit">検索</button>

    </form>
    @if(!empty($select_users))
    <div>
        <table>
            @foreach($select_users as $select_user)
                <a href="{{route('userinfo/{id}', ['id' => $select_user['id']])}}">
                    <dd>{{ $select_user['username'] }}</dd>
                </a>
            @endforeach
        </table>
    </div>
    @endif
@endsection
