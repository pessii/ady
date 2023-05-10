@extends('layouts.app')

@section('content')

    <div class="prose mx-auto text-center">
        <h2>新規登録</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('register') }}" class="w-1/2">
            @csrf

            <div class="form-control my-4">
                <label for="name" class="label">
                    <span class="label-text">氏名</span>
                </label>
                <input type="text" name="name" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="email" class="label">
                    <span class="label-text">メールアドレス</span>
                </label>
                <input type="email" name="email" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="password" class="label">
                    <span class="label-text">パスワード</span>
                </label>
                <input type="password" name="password" class="input input-bordered w-full">
            </div>

            <div class="form-control my-4">
                <label for="password_confirmation" class="label">
                    <span class="label-text">パスワード(確認)</span>
                </label>
                <input type="password" name="password_confirmation" class="input input-bordered w-full">
            </div>
            
            <div class="plan">
                <input type="radio" name="planChoice" class="basic" id="basic" value="1">
                <label for="basic">
                    ベーシック
                </label>
                
                <input type="radio" name="planChoice" class="standard" id="standard" value="2" checked>
                <label for="standard">
                    スタンダード
                </label>
                
                <input type="radio" name="planChoice" class="premium" id="premium" value="3">
                <label for="premium">
                    プレミアム
                </label>
            </div>
            
            <table>
                <tbody>
                    <tr>
                        <td>月額</td>
                        <td>2980円</td>
                        <td>3980円</td>
                        <td>4980円</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>１か月に利用できるコースの数</td>
                        <td>1コース</td>
                        <td>2コース</td>
                        <td>3コース</td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary btn-block normal-case">メンバーシップを開始する</button>
        </form>
    </div>
@endsection