@extends('layouts.frontend')

@section('title')
@guest
<title>DesaConnect</title>
@endguest
@auth
<title>Aduan Publik| DesaConnect</title>
@endauth
@endsection

@section('content')
{{-- Histories Report --}}
<section
    class="px-6 pb-16 overflow-x-hidden bg-white md:px-10 lg:px-24 2xl:px-48 pt-28 md:pt-36 md:pb-28 lg:pt-40 lg:pb-36">
    <h1 class="text-3xl font-bold text-center md:text-4xl lg:text-5xl">Aduan <span class="text-vermillion">Publik</span>
    </h1>
    <h5 class="mt-5 text-xs font-medium leading-6 text-center md:text-sm lg:text-base md:mt-7 lg:mt-8 text-davys-grey">
        Pantau aduan warga, tingkatkan transparansi
    </h5>
    <div>
        <hr class="mt-5 md:mt-7 lg:mt-8 border-1 border-davys-grey">
    </div>

    <div
        class="flex flex-col md:flex-row md:flex-wrap gap-7 md:gap-0 lg:gap-5 md:justify-around lg:justify-center mt-7 md:mt-8 lg:mt-10">

        {{-- Cards History of Reported --}}
        @forelse ($complaints as $complaint)
        <article
            class="group border-2 border-black rounded-lg transition-all duration-500 hover:shadow-[7px_7px_0px_#81ADC8] lg:hover:shadow-[10px_10px_0px_#81ADC8] md:mt-7 lg:mt-0 cursor-pointer md:basis-80 lg:basis-[48%] lg:p-4">
            <a href="{{ route('complaints.show.public', $complaint->id) }}">
                <div class="flex flex-col gap-2 lg:flex-row lg:items-center md:gap-5 lg:gap-4">
                    <img class="object-cover object-center w-full h-40 lg:w-40 lg:h-auto lg:rounded-lg lg:aspect-square"
                        src="{{ $complaint->photo_url ? Storage::url($complaint->photo_url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
                        alt="Bukti Foto">
                    <div class="flex flex-col gap-2 px-4 lg:px-0">
                        <h6 class="font-bold text-vermillion text-sm lg:text-[1rem] mt-2 md:mt-0">{{
                            $complaint->created_at->format('H:i, d-m-Y')
                            }}</h6>
                        <h2
                            class="text-xl font-bold text-black capitalize report-title lg:text-2xl group-active:text-vermillion group-hover:text-vermillion group-hover:transition-all group-hover:duration-500">
                            {{ $complaint->title }}
                        </h2>
                        <hr class="border-1 border-davys-grey">
                        <p class="text-xs font-medium leading-5 report-body lg:text-sm text-davys-grey">{{
                            $complaint->body }}
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-between px-4 mt-4 mb-4 md:my-5 lg:mb-0 lg:px-0">
                    <h6 class="px-3 py-1 text-xs font-medium border rounded-sm text-davys-grey border-davys-grey">
                        {{ $complaint->category->category }}
                    </h6>
                    {{-- Show Status Complaint --}}
                    @include('components.frontend.conditional-statement.show-status-card')
                </div>
            </a>
        </article>
        @empty
        <h3 class="mt-4 text-sm leading-normal text-center lg:text-base text-medium text-davys-grey">Sayang sekali anda
            belum
            mempunyai
            aduan, <a href="{{ route('complainant.complaints.create') }}"><strong>Ayo
                    Kirim Aduan!</strong></a></h3>
        @endforelse

    </div>
    <div class="mt-5 md:mt-10">
        {{ $complaints->links() }}
    </div>
</section>
@endsection