<div>

    <x-card  :title="$title"  :url="$url" >

        <div class="card-body">
            <h5 class="card-title">Profil Anda</h5>
            <div class="card-body">
        <div class="d-flex align-items-center">
                    <img src="{{ user->image_url ?? asset('user-no.png') }}" alt="image {{ $user->name }}" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                    <div class="ml-3">
                        <h5 class="card-title">{{ user()->auth->name ?? '-'  }}</h5>
                        <p class="card-text">{{ user()->auth->email ?? '-'  }}</p>
                    </div>
                </div>
                <ul class="list-group list-group-flush mt-3">
                    <li class="list-group-item">
                        <strong>Roles:</strong>
                        <ul>
                        {{ $user_role  ?? 'Tidak ada role' }}
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </x-card>



</div>
