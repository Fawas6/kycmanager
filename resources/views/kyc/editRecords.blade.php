<div class="content-body">
    <h1>Edit Records</h1>
    <a href="{{route('records.dashboard')}}">Go back to dashboard</a>

    <form method="post" action="{{ route('edit.records') }}">
        @csrf
        <label for="name">Name</label>
        <input style="display:block" type="text" name="name" id="name">

        <label for="email">Email</label>
        <input style="display:block" type="text" name="email" id="email">

        <label for="phone">Phone</label>
        <input style="display:block" type="tel" name="phone" id="phone">

        <label for="address">Address</label>
        <input style="display:block" type="text" name="address" id="address">

        <label for="dob">Date of Birth</label>
        <input style="display:block" type="date" name="dob" id="dob">

        <button style="display:block" type="submit">Edit</button>
    </form>

    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif
</div>

