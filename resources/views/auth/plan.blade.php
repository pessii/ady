@extends('layouts.app')

@section('content')

    <div class="prose mx-auto text-center">
        <h2>あなたにぴったりのプランをお選びください</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('register') }}" class="w-1/2">
            @csrf
            
            <div class="plan">
                <input type="radio" name="planChoice" class="basic" id="basic" value="ベーシック">
                <label for="basic">
                    ベーシック
                </label>
                
                <input type="radio" name="planChoice" class="standard" id="standard" value="スタンダード" checked>
                <label for="standard">
                    スタンダード
                </label>
                
                <input type="radio" name="planChoice" class="premium" id="premium" value="プレミアム">
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

            <button type="submit" class="btn btn-primary btn-block normal-case">続ける</button>
        </form>
    </div>
@endsection