<div class="content-body" style="margin-top: 5vh;">
    @if(session('customer_name'))
        <h1 style="text-align: center;">Welcome {{ session('customer_name') }}, Log in</h1>
        @php
            session()->forget('customer_name');
        @endphp
    @else
        <h1 style="text-align: center;">Log in</h1>
    @endif

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span
                    class="sr-only">Close</span></button>
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span
                    class="sr-only">Close</span></button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form_body" style="display: flex; justify-content: center; align-items: center; margin: 0;">
        <form method="post" action="{{ route('login') }}" style="text-align: center;">
            @csrf
            <div style="font-size: 20px; margin-top: 20px;"><label for="email">Email</label></div>
            <div><input type="email" name="email" id="email"
                    style="height: 40px; width: 300px; margin-top: 10px;" required></div>

            <div style="font-size: 20px; margin-top: 20px"><label for="password">Password</label></div>
            <div><input type="password" name="password" id="password"
                    style="height: 40px; width: 300px; margin-top: 10px;" required></div>

            <div><button type="submit" style="text-align: center; margin-top: 20px; font-size: 20px;">Login</button>
            </div>
            <div style="margin-top: 10px;">Don't have an account? <a href={{ '/' }}>Register</a>
        </form>
    </div>
</div>
