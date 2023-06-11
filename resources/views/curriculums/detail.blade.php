@extends('layouts.app')

@section('content')
    <div class="prose ml-4">
        <h2>作成完了ページ</h2>
    </div>
    
    <div>
        <p>作成ありがとうございます。作成内容ご確認して頂き、販売可能でしたら「販売する」ボタンをクリックお願いいたします。</p>
        <a href="{{ route('teacher.instructor') }}" class="">販売開始</a>
    </div>
@endsection