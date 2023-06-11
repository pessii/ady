@extends('layouts.app')

@section('content')
    <div class="mt-4">
        <span class="text-muted text-gray-500">成功</span>
            <ul class="list-none">
                @foreach ($curriculums as $curriculum)
                    <li class="flex items-start gap-x-2 mb-4">
                        <div>
                            <div>
                                <div>
                                    <span class="text-muted text-gray-500">コース名</span>
                                    {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                                    <a class="link link-hover text-info" href="{{ route('curriculums.create', $curriculum->id) }}">{{ $curriculum->title }}</a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        {{-- カリキュラム投稿ページ --}}
        <a class="btn btn-outline" href="{{ route('curriculums.create') }}">コースを作成</a>
    </div>
@endsection