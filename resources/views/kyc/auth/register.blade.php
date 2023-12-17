<div class="content-body" style="margin-top: 5vh;">
    <h1 style="text-align: center;">Register</h1>

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
        <form method="post" action="{{ route('register') }}" style="text-align: center;" enctype="multipart/form-data">
            @csrf
            <div style="font-size: 20px;"><label for="name">Name</label></div>
            <div><input type="text" name="name" id="name"
                    style="height: 40px; width: 300px; margin-top: 10px;" required></div>

            <div style="font-size: 20px; margin-top: 20px;"><label for="email">Email</label></div>
            <div><input type="email" name="email" id="email"
                    style="height: 40px; width: 300px; margin-top: 10px;" required></div>

            <div style="font-size: 20px; margin-top: 20px"><label for="phone">Mobile Phone No.</label></div>
            <div><input type="tel" name="phone" id="phone"
                    style="height: 40px; width: 300px; margin-top: 10px;" required></div>

            <div style="font-size: 20px; margin-top: 20px"><label for="address">Address</label></div>
            <div><input type="text" name="address" id="address"
                    style="height: 40px; width: 300px; margin-top: 10px;" required></div>

            <div style="font-size: 20px; margin-top: 20px"><label for="dob">Date of birth</label></div>
            <div><input type="date" name="dob" id="dob"
                    style="height: 40px; width: 300px; margin-top: 10px;" required></div>

            <div style="font-size: 20px; margin-top: 20px"><label for="cv">CV</label></div>
            <div><input type="file" name="cv" id="cv" accept=".pdf, .doc, .docx"
                    style="height: 40px; width: 300px; margin-top: 10px;" required></div>

            <div style="font-size: 20px; margin-top: 20px"><label for="password">Password</label></div>
            <div><input type="password" name="password" id="password"
                    style="height: 40px; width: 300px; margin-top: 10px;" required></div>

            <div style="font-size: 20px; margin-top: 20px"><label for="password_confirmation">Confirm Password</label></div>
            <div><input type="password" name="password_confirmation" id="password_confirmation" style="height: 40px; width: 300px; margin-top: 10px;" required></div>

            <div><button type="submit" style="text-align: center; margin-top: 20px; font-size: 20px;">Register</button>
            </div>
            <div style="margin-top: 10px;">Already have an account? <a href={{ 'login' }}>Login</a>
        </form>
    </div>
</div>
