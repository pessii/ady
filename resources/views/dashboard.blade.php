@extends('layouts.app')

@section('content')
    <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
        <div class="hero-content text-left my-10">
            <div class="max-w-md mb-10">
                <h2>新しい知識を学んで視野を広げよう。今すぐ新規登録してお得に学ぼう！</h2>
                {{-- ユーザ登録ページへのリンク --}}
                <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">今すぐ新規登録</a>
            </div>
        </div>
    </div>
@endsection