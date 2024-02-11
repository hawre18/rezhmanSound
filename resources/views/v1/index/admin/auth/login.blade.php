@extends('v1.template.admin.auth.app')
@section('content')
<div class="bodyLogin">
    <h3>ورود</h3>
    <div class="headerLogin">
        <div class="contentLogin">
            مشخصات
        </div>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
        <label class="emailLabel" for="email">ایمیل</label>
        <input type="email" name="email" id="emailLogin" >
            <br><br>
        <label class="passwordLabel" for="pass">رمز عبور</label>
        <input type="password" name="password" id="passwordLogin">
        <br><br>

        <label class="mycheck" for="check">بخاطرسپردن</label>
        <input type="checkbox" name="remember" id="checkRemmber">
            <input type="submit" id="submitLogin" value="ورود">
        </form>
    </div>

</div>


@endsection

