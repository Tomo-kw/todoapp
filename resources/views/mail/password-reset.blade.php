<!-- mailtrapでメール送信後の表示チェック -->
<a href="{{ route('password.reset', ['token' => $token]) }}">
    パスワード再設定リンク
</a>