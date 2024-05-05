@if($list->kode_surat == 'sktm')
    <x-template-surat.sktm :list="$list" :user="$user" :qrCodes="$qrCodes"/>
@elseif($list->kode_surat == 'skk')
    <x-template-surat.skk :list="$list" :user="$user" :qrCodes="$qrCodes"/>
@elseif($list->kode_surat == 'skd')
    <x-template-surat.skd :list="$list" :user="$user" :qrCodes="$qrCodes"/>
@elseif($list->kode_surat == 'sku')
    <x-template-surat.sku :list="$list" :user="$user" :qrCodes="$qrCodes"/>
@endif
