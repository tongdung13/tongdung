@extends('layouts.login')

@section('content')

    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign
                In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <form action="{{ route('authenticate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="user" class="label">Email</label>
                            <input id="user" type="email" name="email" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Mật khẩu</label>
                            <input id="pass" type="password" name="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check">
                            <label for="check"><span class="icon"></span> Rememger me</label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button dropdown-item" value="Sign In" id="block"
                                style="display: block" onclick="return false">
                            <input type="submit" class="button dropdown-item" value="Sign In" id="none"
                                style="display: none">
                        </div>
                    </div>
                </form>

                <div class="sign-up-htm">
                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="group">
                            <label for="user" class="label">Tên </label>
                            <input id="user" type="text" name="name" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Email</label>
                            <input id="pass" type="email" name="email" class="input">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Mật khẩu</label>
                            <input id="pass" type="password" name="password" class="input" data-type="password">
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Nhập lại mật khẩu</label>
                            <input id="pass" type="password" name="password_confirmation" class="input"
                                data-type="password">
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign Up">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            document.getElementById("check").onclick = function() {
                document.getElementById("block").style.display = 'none';
                document.getElementById("none").style.display = 'block';
            };
        </script>
    </div>

@endsection
