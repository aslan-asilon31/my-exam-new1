<x-card  shadow separator class="border shadow">
    <div class="overflow-x-auto">
        <button label="Buat" @click="$wire.modalPertanyaan = true"  class="border text-xs md:text-sm border-gray-800 text-gray-800 bg-transparent hover:bg-gray-800 hover:text-white font-semibold py-2 px-4 rounded transition duration-200"> Buat </button>
        @if ($soals)
        <table class="w-full bg-white shadow-md rounded-lg">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Action</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">No Urut</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">ID</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Image</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Asesmen ID</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Pertanyaan</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Jenis</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Durasi</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Bobot</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Dibuat Oleh</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Diupdate Oleh</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Tanggal Dibuat</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Tanggal Diupdate</th>
                    <th class="px-6 py-3 text-sm md:text-md text-left">Apa Aktif</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($soals as $item)
                    <tr>
                        <td class="">
                            <x-dropdown label="">
                                <x-menu-item title="Ubah" @click="$wire.ubah('{{ $item['id'] }}')" />
                                <x-menu-item title="Hapus" @click="$wire.hapus('{{ $item['id'] }}')" />
                            </x-dropdown>
                        </td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->no_urut }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->id }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm"> <img src="{{ $item->image_url }}" alt="" srcset=""> </td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->asesmen_id }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{!! $item->pertanyaan !!}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->jenis }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->durasi }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->bobot }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->dibuat_oleh }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->diupdate_oleh }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->tgl_dibuat }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->tgl_diupdate }}</td>
                        <td class="px-6 py-4 text-xs md:text-sm">{{ $item->apa_aktif ? 'Ya' : 'Tidak' }}</td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td class="">
                            no data
                        </td>
                    </tr>

                @endforelse
            </tbody>
        </table>
        @else
        <img src="{{ asset('flat-image/flat404.png') }}"  class="w-32 md:w-64" alt="" srcset="">
        @endif

        <x-modal wire:model="modalPertanyaan" class=" backdrop-blur">

            <x-form wire:submit="{{ $idSoal ? 'update' : 'simpan' }}" wire:confirm="Are you sure?">
                <div class="text-center mt-3">
                  Soal
                </div>
                <x-menu-separator />

                  <div id="pertanyaan">

                    <div class="mb-3">
                        <x-input  label="" wire:model="masterSoalForm.asesmen_id" id="masterSoalForm.asesmen_id" name="masterSoalForm.asesmen_id" placeholder="asesmen id" hidden/>
                    </div>

                    <div class="mb-3 ">
                        <input type="file" wire:model="masterSoalForm.image_url" accept="image/*">

                    </div>

                    <div class="form-group" wire:ignore>
                        <label for="pertanyaan">Pertanyaan</label>
                        {{-- <x-markdown type="text" input="masterSoalForm.pertanyaan"  class="form-control " wire:model="masterSoalForm.pertanyaan"></x-markdown> --}}
                        <x-markdown type="text"   class="form-control " wire:model="masterSoalForm.pertanyaan"/>
                    </div>

                    <div class="mb-3">
                        <x-input  label="Bobot" wire:model.blur="masterSoalForm.bobot" id="masterSoalForm.bobot" name="masterSoalForm.bobot" placeholder="Bobot" />
                    </div>

                    <div class="mb-3">
                        <x-input label="Nomor Urut" wire:model.blur="masterSoalForm.no_urut" id="masterSoalForm.no_urut" name="masterSoalForm.no_urut" placeholder="Nomor Urut" />
                    </div>

                    <div class="mb-3">
                        <x-input  label="Durasi (Detik)" wire:model.blur="masterSoalForm.durasi" id="masterSoalForm.durasi" name="masterSoalForm.durasi" placeholder="Durasi" />
                    </div>

                    @if (!$isReadonly)
                      <div class="text-center mt-3">
                        <x-errors class="text-white mb-3" />
                        <x-button type="submit" :label="$idSoal ? 'update' : 'Simpan'" class="btn-success btn-sm text-white" />
                      </div>
                    @endif

                  </div>
              </x-form>

            <x-button label="Cancel" class="text-xs md:text-sm" wire.click="closeModal" />

        </x-modal>

        <x-modal wire:model="modalPertanyaanHapus" class="backdrop-blur text-xs md:text-sm">
            <x-button label="Cancel" wire.click="closeModal" />
        </x-modal>

    </div>

</x-card>
