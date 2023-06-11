@extends('layouts.app')

@section('content')
    <div class="prose ml-4">
        <h2>コース紹介ページ</h2>
    </div>
    
    <p>コース紹介ページは、Udemyでの成功に不可欠です。正しく作成すれば、Googleなどの検索エンジンでのヒット率を高めるのにも役立ちます。
        このセクションを完了したら、あなたのコースに登録すべき理由を示す魅力的なコース紹介ページを作成しましょう。
        コース紹介ページの作成とコースタイトルの基準の詳細をご覧ください。</p>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('sections.referral_save') }}" enctype="multipart/form-data" class="w-1/2">
            @csrf
            
                <h2>コースタイトル</h2>
                <div class="form-control my-4">
                    <input type="text" name="title" class="input input-bordered w-full">
                </div>
                
                <h2>コースの説明</h2>
                <div class="form-control my-4">
                    <input type="text" name="course_description" class="input input-bordered w-full">
                </div>
                
                <div>
                    <select name="information_level">
                        <option>レベル選択</option>
                        <option value="elementary">初級レベル</option>
                        <option value="intermediate">中級レベル</option>
                        <option value="specialty">専門レベル</option>
                        <option value="all">すべてのレベル</option>
                    </select>
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
                
                <h2>コース画像</h2>
                <div class="movie form-control my-4">
                    <p>ここにコース画像をアップロードしてください。使用する画像は、Udemyのコース画像品質基準に適合している必要があります。
                        重要なガイドライン: 750x422ピクセル、.jpg、.jpeg、.gif、または.png形式、テキストを含む画像は不可。</p>
                    <label class="course_img">
                        ファイルをアップロード
                        <input type="file" name="post_img" class="input_img">
                    </label>
                </div>
                
                <h2>プロモーションビデオ</h2>
                <div class="movie form-control my-4">
                    <p>プロモーション動画は、受講生がコースで学習する内容をすばやく効果的にプレビューできる方法です。
                        プロモーション動画がよくできていれば、コースを検討している受講生が登録する可能性が高くなります。</p>
                    <label class="course_movie">
                        ファイルをアップロード
                        <input type="file" name="post_movie" class="input_movie">
                    </label>
                </div>

            <button type="submit" class="btn btn-outline">次へ</button>
        </form>
    </div>
@endsection