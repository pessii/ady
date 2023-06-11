@extends('layouts.app')

@section('content')
    <div class="prose ml-4">
        <h2>カリキュラム</h2>
    </div>
    
    <p>セクション、レクチャー、演習アクティビティ（小テスト、コーディング演習、課題）を作成して、コースを組み立て始めましょう。
        コースの概要を使用してコンテンツを構成し、セクションとレクチャーにわかりやすい名前を付けてください。 
        コースを無料で提供する場合、そのコースに含まれるビデオコンテンツの総時間が2時間を超えてはいけません。</p>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('sections.store') }}" enctype="multipart/form-data" class="w-1/2">
            @csrf
            
                <div class="form-control my-4">
                    <p class="label-text">セクション：1</p>
                    <input type="text" name="section_name[][item]" class="input input-bordered w-full">
                </div>
                
                <div class="lecture_whole">
                    
                    <div class="lecture form-control my-4">
                        <label class="first_lecture label-text">
                            レクチャー：1
                            <input type="text" name="lecture_name[][item]" class="first_input input input-bordered w-full">
                        </label>
                    </div>
                    
                    <div class="movie form-control my-4">
                        <label class="first_movie">
                            画像 / 動画をアップロード
                            <input type="file" name="post_img" class="input_movie">
                        </label>
                    </div>
                    
                    <button type="button" class="increase_list btn btn-outline">＋レクチャー</button>
                    
                </div>

            <button type="submit" class="btn btn-outline">次へ</button>
        </form>
    </div>
    <script>
        document.querySelector(".increase_list").addEventListener('click', () => {
          const formCount = document.querySelectorAll('.lecture').length + 1;
          
          const newForm = document.createElement('input');
          newForm.type = 'text';
        
          const newLabel = document.createElement('label');
          newLabel.textContent = 'レクチャー(' + formCount + ')：';
        
          newLabel.appendChild(newForm);
          document.querySelector('.movie').appendChild(newLabel);
        });
    </script>
@endsection