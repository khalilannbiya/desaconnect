<!-- Desktop sidebar -->
<aside class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="{{ auth()->user()->role_id === 2 ? route('staff.dashboard.index') : route('admin.dashboard.index') }}">
            DesaConnect
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">

                @if (in_array(Route::current()->getName(), ['staff.dashboard.index', 'admin.dashboard.index']))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                @endif

                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ in_array(Route::current()->getName(), ['staff.dashboard.index', 'admin.dashboard.index']) ? 'text-gray-800 dark:text-gray-100' : '' }}"
                    href="{{ auth()->user()->role_id === 2 ? route('staff.dashboard.index') : route('admin.dashboard.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">

                @if (in_array(Route::current()->getName(), ['staff.complaints.index', 'staff.complaints.show',
                'admin.complaints.index', 'admin.complaints.show']))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                @endif

                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ in_array(Route::current()->getName(), ['staff.complaints.index', 'staff.complaints.show', 'admin.complaints.index', 'admin.complaints.show']) ? 'text-gray-800 dark:text-gray-100' : '' }}"
                    href="{{ auth()->user()->role_id === 2 ? route('staff.complaints.index') : route('admin.complaints.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">Pengaduan</span>
                </a>
            </li>
            <li class="relative px-6 py-3">

                @if (in_array(Route::current()->getName(), ['staff.documents.index', 'staff.documents.show',
                'admin.documents.index', 'admin.documents.show']))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                @endif

                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ in_array(Route::current()->getName(), ['staff.documents.index', 'staff.documents.show', 'admin.documents.index', 'admin.documents.show']) ? 'text-gray-800 dark:text-gray-100' : '' }}"
                    href="{{ auth()->user()->role_id === 2 ? route('staff.documents.index') : route('admin.documents.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">Pengajuan Surat</span>
                </a>
            </li>
            <li class="relative px-6 py-3">

                @if (in_array(Route::current()->getName(), ['staff.users.index',
                'admin.users.index']))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                @endif

                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ in_array(Route::current()->getName(), ['staff.users.index', 'admin.users.index']) ? 'text-gray-800 dark:text-gray-100' : '' }}"
                    href="{{ auth()->user()->role_id === 2 ? route('staff.users.index') : route('admin.users.index') }}">
                    <i class="text-lg ti ti-users"></i>
                    <span class="ml-4">Masyarakat</span>
                </a>
            </li>
            @if (auth()->user()->role_id !== 2)
            <li class="relative px-6 py-3">

                @if (in_array(Route::current()->getName(), ['admin.users.get-officer']))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                @endif

                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ in_array(Route::current()->getName(), ['admin.users.get-officer']) ? 'text-gray-800 dark:text-gray-100' : '' }}"
                    href="{{ route('admin.users.get-officer') }}">
                    <i class="text-lg ti ti-users"></i>
                    <span class="ml-4">Petugas</span>
                </a>
            </li>
            @endif
            <li class="relative px-6 py-3">

                @if (in_array(Route::current()->getName(), ['staff.categories.index', 'admin.categories.index']))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                @endif

                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ in_array(Route::current()->getName(), ['staff.categories.index', 'admin.categories.index']) ? 'text-gray-800 dark:text-gray-100' : '' }}"
                    href="{{ auth()->user()->role_id === 2 ? route('staff.categories.index') : route('admin.categories.index') }}">
                    <i class="text-lg ti ti-category"></i>
                    <span class="ml-4">Kategori</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<!-- Mobile sidebar -->
<!-- Backdrop -->
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
    x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="{{ route('staff.dashboard.index') }}">
            DesaConnect
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">

                @if (in_array(Route::current()->getName(), ['staff.dashboard.index', 'admin.dashboard.index']))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                @endif

                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-zgray-200 {{ in_array(Route::current()->getName(), ['staff.dashboard.index', 'admin.dashboard.index']) ? 'text-gray-800 dark:text-gray-100' : '' }}"
                    href="{{ auth()->user()->role_id === 2 ? route('staff.dashboard.index') : route('admin.dashboard.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">

                @if (in_array(Route::current()->getName(), ['staff.complaints.index', 'staff.complaints.show',
                'admin.complaints.index', 'admin.complaints.show']))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                @endif

                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ in_array(Route::current()->getName(), ['staff.complaints.index', 'staff.complaints.show', 'admin.complaints.index', 'admin.complaints.show']) ? 'text-gray-800 dark:text-gray-100' : '' }}"
                    href="{{ auth()->user()->role_id === 2 ? route('staff.complaints.index') : route('admin.complaints.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">Pengaduan</span>
                </a>
            </li>
            <li class="relative px-6 py-3">

                @if (in_array(Route::current()->getName(), ['staff.documents.index', 'staff.documents.show',
                'admin.documents.index', 'admin.documents.show']))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                @endif

                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ in_array(Route::current()->getName(), ['staff.documents.index', 'staff.documents.show', 'admin.documents.index', 'admin.documents.show']) ? 'text-gray-800 dark:text-gray-100' : '' }}"
                    href="{{ auth()->user()->role_id === 2 ? route('staff.documents.index') : route('admin.documents.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">Pengajuan Surat</span>
                </a>
            </li>
            <li class="relative px-6 py-3">

                @if (in_array(Route::current()->getName(), ['staff.users.index', 'admin.users.index']))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                @endif

                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ in_array(Route::current()->getName(), ['staff.users.index', 'admin.users.index']) ? 'text-gray-800 dark:text-gray-100' : '' }}"
                    href="{{ auth()->user()->role_id === 2 ? route('staff.users.index') : route('admin.users.index') }}">
                    <i class="text-lg ti ti-users"></i>
                    <span class="ml-4">Masyarakat</span>
                </a>
            </li>
            @if (auth()->user()->role_id !== 2)
            <li class="relative px-6 py-3">

                @if (in_array(Route::current()->getName(), ['admin.users.get-officer']))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                @endif

                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ in_array(Route::current()->getName(), ['admin.users.get-officer']) ? 'text-gray-800 dark:text-gray-100' : '' }}"
                    href="{{ route('admin.users.get-officer') }}">
                    <i class="text-lg ti ti-users"></i>
                    <span class="ml-4">Petugas</span>
                </a>
            </li>
            @endif
            <li class="relative px-6 py-3">

                @if (in_array(Route::current()->getName(), ['staff.categories.index', 'admin.categories.index']))
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                @endif

                <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ in_array(Route::current()->getName(), ['staff.categories.index', 'admin.categories.index']) ? 'text-gray-800 dark:text-gray-100' : '' }}"
                    href="{{ auth()->user()->role_id === 2 ? route('staff.categories.index') : route('admin.categories.index') }}">
                    <i class="text-lg ti ti-category"></i>
                    <span class="ml-4">Kategori</span>
                </a>
            </li>
        </ul>
    </div>
</aside>