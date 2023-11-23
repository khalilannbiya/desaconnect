@if ($document->status === "tidak valid")
<p class="font-bold text-xs text-red-500 capitalize">{{ $document->status }}</p>
@elseif ($document->status === 'proses validasi')
<p class="font-bold text-xs text-yellow-500 capitalize">{{ $document->status }}</p>
@elseif ($document->status === 'diproses')
<p class="font-bold text-xs text-yellow-500 capitalize">{{ $document->status }}</p>
@else
<p class="font-bold text-xs text-green-500 capitalize">{{ $document->status }}</p>
@endif
