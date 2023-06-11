@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>講師登録ページ</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('teachers.store') }}" class="w-1/2">
            @csrf

                <div class="form-control my-4">
                    <label for="content" class="label">
                        <span class="label-text">講師名</span>
                    </label>
                    <input type="text" name="name" class="input input-bordered w-full">
                </div>
                
                <div class="prose">
                    <h2>これまでにどのような指導経験がありますか？</h2>
                </div>
                
                <div>
                    <label class="check_lb">
                        <input type="radio" checked>プライベートに直接指導した経験あり。
                    </label>
                    <label class="check_lb">
                        <input type="radio">職業として直接指導した経験あり。
                    </label>
                    <label class="check_lb">
                        <input type="radio">オンライン授業の経験あり。
                    </label>
                    <label class="check_lb">
                        <input type="radio">その他
                    </label>
                </div>
                
                <div class="prose">
                    <h2>今までビデオ制作をした経験はありますか？</h2>
                </div>
                
                <div>
                    <label class="check_lb">
                        <input type="radio" checked>初心者です。
                    </label>
                    <label class="check_lb">
                        <input type="radio">ある程度の知識があります。
                    </label>
                    <label class="check_lb">
                        <input type="radio">経験豊富です。
                    </label>
                    <label class="check_lb">
                        <input type="radio">すぐにアップロードできるビデオがあります。
                    </label>
                </div>
                
                <div class="prose">
                    <h2>コースの受講生はいますか？</h2>
                </div>
                
                <div>
                    <label class="check_lb">
                        <input type="radio" checked>今のところいません。
                    </label>
                    <label class="check_lb">
                        <input type="radio">受講生は少しいます。
                    </label>
                    <label class="check_lb">
                        <input type="radio">かなりの受講生がいます。
                    </label>
                </div>
                

            <button type="submit" class="btn btn-outline">登録</button>
        </form>
    </div>
@endsection