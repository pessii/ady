<!--ログイン済みユーザーか判定-->
@if (Auth::check())
    {{-- 講師ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('teacher.instructor') }}">講師</a></li>
    {{-- ユーザ詳細ページへのリンク --}}
    <li><a class="link link-hover" href="#">{{ Auth::user()->name }}</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログアウトへのリンク --}}
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">Logout</a></li>
@else
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('login') }}">ログイン</a></li>
    {{-- ユーザ登録ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">新規登録</a></li>
    <li class="divider lg:hidden"></li>
@endif