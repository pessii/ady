@extends('layouts.app')

@section('content')
    <div class="prose ml-4">
        <h2>想定する学習者</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('learns.store') }}" class="w-1/2">
            @csrf
            
                <h2>コースで受講生は何を学びますか？</h2>
                <div class="form-control my-4">
                    <p class="label-text">コースを修了後に学習者が達成できると期待できる学習目的や成果 を4つ以上入力する必要があります。</p>
                    <input type="text" name="what_learn[][item]" class="input input-bordered w-full">
                    <input type="text" name="what_learn[][item]" class="input input-bordered w-full">
                    <input type="text" name="what_learn[][item]" class="input input-bordered w-full">
                    <input type="text" name="what_learn[][item]" class="input input-bordered w-full">
                </div>
                
                <h2>コースを受講するための要件や前提条件は何ですか?</h2>
                <div class="form-control my-4">
                    <p class="label-text">コースを受講する学習者に求められるスキル、経験、ツール、機器をリストアップします。</p>
                    <p class="label-text">そのような要件がない場合は、その点を初心者にとってのハードルを下げるチャンスとして利用しましょう。</p>
                    <input type="text" name="requirement[][item]" class="input input-bordered w-full">
                </div>
                
                <h2>誰に向けたコースですか?</h2>
                <div class="form-control my-4">
                    <p class="label-text">コースの内容が必ず役に立つ、想定する学習者を明確に示します。</p>
                    <p class="label-text">そうすることで、最適な学習者にコースをアピールすることができます。</p>
                    <input type="text" name="to_whom[][item]" class="input input-bordered w-full">
                </div>

            <button type="submit" class="btn btn-outline">次へ</button>
        </form>
    </div>
@endsection