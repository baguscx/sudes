@if($list->kode_surat == 'sktm')
    <x-template-surat.sktm :list="$list" :ps="$ps" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
@elseif($list->kode_surat == 'skk')
    <x-template-surat.skk :list="$list" :ps="$ps" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
@elseif($list->kode_surat == 'skd')
    <x-template-surat.skd :list="$list" :ps="$ps" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
@elseif($list->kode_surat == 'sku')
    <x-template-surat.sku :list="$list" :ps="$ps" :user="$user" :qrCodes="$qrCodes" :indeks="$indeks"/>
@endif
