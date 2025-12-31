<x-app-layout>

    {{-- berisi semua user yang terdaftar --}}

    <div class="container mt-4">
        <h2 class="mb-3">Daftar User</h2>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5>{{ $user->name }}</h5>
                            <p class="text-muted">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>