<div x-show="isModalAddCategoryOpen" x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
    <!-- Modal -->
    <div x-show="isModalAddCategoryOpen" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModalAddCategory"
        @keydown.escape="closeModalAddCategory"
        class="w-full px-6 py-4 overflow-hidden bg-gray-800 rounded-t-lg sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog"
        id="modalAddCategory">
        <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
        <header class="flex justify-end">
            <button
                class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded hover:text-gray-700"
                aria-label="close" @click="closeModalAddCategory">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                    <path
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
        </header>
        <!-- Modal body -->
        <form action="{{ route('admin.categories.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="mt-4 mb-6">
                <!-- Modal title -->
                <p class="mb-2 text-lg font-semibold text-gray-300">
                    Tambah Kategori
                </p>
                <!-- Modal description -->
                <label class="block mt-4 text-sm">
                    <input id="category" name="category" type="text" value="{{ old('category') }}"
                        class="block w-full mt-1 text-sm text-gray-300 bg-gray-700 border-gray-600 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple focus:shadow-outline-gray">
                </label>
            </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 bg-gray-800 sm:space-y-0 sm:space-x-6 sm:flex-row">
                <button @click="closeModalAddCategory" type="button"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-gray-400 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                    Cancel
                </button>
                <button type="submit"
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Tambah
                </button>
            </footer>
        </form>
    </div>
</div>