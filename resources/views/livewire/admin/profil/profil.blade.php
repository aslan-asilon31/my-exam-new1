<div>
    <style>
        .profile-grid {
            display: grid;
            grid-template-columns: 80px 1fr;
            gap: 2px;
            align-items: start;
        }
    
        .profile-image {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 50%;
        }

    </style>
    
    <x-card :title="$title" :url="$url">
        <div class="profile-grid">
            <!-- Kiri: Foto Profil -->
            <div class="text-center">
                <img 
                    src="{{ $user->image_url ?? asset('user-no.png') }}" 
                    alt="image {{ $user->name }}" 
                    class="profile-image"
                >
            </div>
    
            <!-- Kanan: Data User -->
            <div>
                <div class="form-group">
                    <p class="text-sm">Nama : {{ $user->name ?? '-' }}</p>
                </div>
    
                <div class="form-group">
                    <p class="text-sm">Email : {{ $user->email ?? '-' }}</p>
                </div>
    
                <div class="form-group">
                    <p class="text-sm">Roles : {{ $user_role ?? 'Tidak ada role' }}</p>
                </div>
            </div>
        </div>
    </x-card>
    
</div>
