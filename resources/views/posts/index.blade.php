@extends('layouts.login')

@section('content')

<h2>機能を実装していきましょう。</h2>
<div class="form-group row">
　<a href="/search">検索</a>
</div>
{{ $user['username'] }}さん
<div class="form-group row">
   <form method="POST" action="{{ route('post') }}">
       @csrf
       <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('投稿内容') }}</label>
            <input type="hidden" name="username" value={{$user['username']}}>
       <div class="col-md-6">
           <textarea name="post-content" id="post-content" cols="30" rows="10"></textarea>
       </div>

       <button type="submit">投稿</button>
   </form>
</div>
<div class='container'>
    <h2 class='page-header'>投稿一覧</h2>
    <table class='table table-hover'>
        <tr>
            <th>投稿者</th>
            <th>投稿内容</th>
            <th>投稿日時</th>
        </tr>
        @foreach ($list as $list)
            <tr>
                <td>{{ $list->username }}</td>
                <td>{{ $list->posts }}</td>
                <td>{{ $list->created_at }}</td>
            </tr>
        @endforeach
    </table>
</div>
@endsection
