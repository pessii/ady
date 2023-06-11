@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>コース作成ページ</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('curriculums.store') }}" class="w-1/2">
            @csrf
            
                <h2>タイトルをつけておきましょう。</h2>

                <div class="form-control my-4">
                    <label for="title" class="label">
                        <span class="label-text">今良いタイトルが浮かんでこなくても大丈夫。あとで変更できます。</span>
                    </label>
                    <input type="text" name="title" class="input input-bordered w-full">
                </div>
                
                <div>
                    <select name="category">
                        <option>カテゴリー選択</option>
                        <option value="development">開発</option>
                        <option value="business">ビジネス</option>
                        <option value="marketing">マーケティング</option>
                        <option value="others">その他</option>
                    </select>
                </div>

            <button type="submit" class="btn btn-outline">次へ</button>
        </form>
    </div>
@endsection