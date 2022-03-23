<div class="debug fixed top-16 right-6 space-y-4 p-4 overflow-hidden pointer-events-none" id="easy-alert-box">

    {{-- success --}}
    @if (session()->has("success"))
    <div class="easy-alert relative bg-green-50 border border-green-100 rounded-lg shadow-lg p-4 w-[320px] pointer-events-auto"
        id="easy-alert-success">
        <div class="flex gap-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <h2 class="font-semibold leading-none text-green-800">Succussful!</h2>
                <p class="text-muted text-sm mt-2 text-green-700">{{ session('success') }}</p>
            </div>
        </div>
        <div class="absolute top-3 right-3">
            <button type="button" onclick="closeAlert('easy-alert-success')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-800" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
    @endif
    {{-- /success --}}

    {{-- info --}}
    @if (session()->has("info"))
    <div class="easy-alert relative bg-blue-50 border border-blue-100 rounded-lg shadow-lg p-4 w-[320px] pointer-events-auto"
        id="easy-alert-info">
        <div class="flex gap-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <h2 class="font-semibold leading-none text-blue-800">Information!</h2>
                <p class="text-muted text-sm mt-2 text-blue-700">{{ session('info') }}</p>
            </div>
        </div>
        <div class="absolute top-3 right-3">
            <button type="button" onclick="closeAlert('easy-alert-info')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-800" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
    @endif
    {{-- /info --}}

    {{-- warning --}}
    @if (session()->has("warning"))
    <div class="easy-alert relative bg-yellow-50 border border-yellow-100 rounded-lg shadow-lg p-4 w-[320px] pointer-events-auto"
        id="easy-alert-warning">
        <div class="flex gap-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <div>
                <h2 class="font-semibold leading-none text-yellow-800">Attention needed!</h2>
                <p class="text-muted text-sm mt-2 text-yellow-700">{{ session('warning') }}</p>
            </div>
        </div>
        <div class="absolute top-3 right-3">
            <button type="button" onclick="closeAlert('easy-alert-warning')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-800" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
    @endif
    {{-- /warning --}}

    {{-- danger --}}
    @if (session()->has("danger"))
    <div class="easy-alert relative bg-red-50 border border-red-100 rounded-lg shadow-lg p-4 w-[320px] pointer-events-auto"
        id="easy-alert-danger">
        <div class="flex gap-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <h2 class="font-semibold leading-none text-red-800">Error!</h2>
                <p class="text-muted text-sm mt-2 text-red-700">{{ session('danger') }}</p>
            </div>
        </div>
        <div class="absolute top-3 right-3">
            <button type="button" onclick="closeAlert('easy-alert-danger')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-800" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
    @endif
    {{-- /danger --}}

    {{-- errors --}}
    @if ($errors->any())
    <div class="easy-alert relative bg-red-50 border border-red-100 rounded-lg shadow-lg p-4 min-w-[320px] pointer-events-auto pr-12"
        id="easy-alert-errors">
        <div class="flex gap-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

            </div>
            <div>
                <h2 class="font-semibold leading-none mb-2 text-red-800">There were {{ count($errors->all()) }} errors
                    with you submission</h2>
                <ul class="list-inside list-disc">
                    @foreach ($errors->all() as $error)
                    <li class="list-item text-sm text-red-700">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="absolute top-3 right-3">
            <button type="button" onclick="closeAlert('easy-alert-errors')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-800" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
    @endif
    {{-- /errors --}}

    <script>
        function closeAlert($id) {
            document.getElementById($id).classList.add('close');  
        }
    </script>
</div>