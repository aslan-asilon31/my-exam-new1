<div>

    <div class="border w-96">
        <div>
            {{$indexDetailPenggunaAsesmen }} <br/>
            <pre class="max-h-28 overflow-scroll">
                {{ print_r($detailPenggunaAsesmen) }}
            </pre>
        </div>
       <div>
        @dump( $detailPenggunaAsesmen[$indexDetailPenggunaAsesmen])
       </div>
       <div class="text-center">
        <button type="button" wire:click="soalSelanjutnya" class="btn btn-sm btn-success text-white">Selanjutnya</button>
       </div>
    </div>

</div>
