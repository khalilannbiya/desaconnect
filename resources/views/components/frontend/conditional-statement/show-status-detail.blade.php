@if ($complaint->status === 'belum diproses')
<p class="capitalize font-bold text-xs md:text-base lg:text-lg text-red-500">{{ $complaint->status }}</p>
@elseif ($complaint->status === 'sedang diproses')
<p class="capitalize font-bold text-xs md:text-base lg:text-lg text-yellow-500">{{ $complaint->status }}</p>
@else
<p class="capitalize font-bold text-xs md:text-base lg:text-lg text-green-500">{{ $complaint->status }}</p>
@endif