<div class="content-body">
    <h1>Dashboard</h1>
    <div><a href={{ route('edit.records') }}>Edit Records</a></div>
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span
                    aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            {{ session('success') }}
        </div>
    @endif

    @foreach ($records as $record)
        <div>
            Name: {{ $record->name }} <br/>
            Email: {{ $record->email }} <br/>
            Phone: {{ $record->phone }} <br/>
            Address: {{ $record->address }} <br/>
            Date of birth: {{ $record->dob }}
            <form method="post" action="{{ route('delete.records', ['id' => $record->id]) }}">
                @csrf
                <button type="submit" class="delete-button">Delete</button>
            </form>
        </div>
    @endforeach
    <form method="post" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
