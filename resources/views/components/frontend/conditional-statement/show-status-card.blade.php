@if ($complaint->status === 'belum diproses')
<p class="font-bold text-xs text-red-500 capitalize">{{ $complaint->status }}</p>
@elseif ($complaint->status === 'sedang diproses')
<p class="font-bold text-xs text-yellow-500 capitalize">{{ $complaint->status }}</p>
@else
<p class="font-bold text-xs text-green-500 capitalize">{{ $complaint->status }}</p>
@endif