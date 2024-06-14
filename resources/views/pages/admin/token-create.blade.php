<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-dashboard-shell>
        <div class="flex flex-col justify-center items-center gap-5" x-data="{ showAlert: false }">
            <header class="mb-5 w-full text-center flex flex-col gap-1 text-black rounded-lg p-5 bg-white shadow-lg text-slate-700">
                <h1 class="text-5xl font-black">{{ explode('|', $title)[1] }}</h1>
            </header>
            <p>This token will expire in 20 minutes if not used to make an author request. Distribute this token securely with a validated member.</p>
            <div id="token" class="bg-white shadow-lg p-10 rounded-lg">{{ $token }}</div>
            <template x-if="showAlert">
                <div class="flex rounded-md bg-rounded p-4 text-sm text-blue-500 bg-blue-100" x-cloak>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-3 h-5 w-5 flex-shrink-0">
                        <path fill-rule="evenodd" d="M19 10.5a8.5 8.5 0 11-17 0 8.5 8.5 0 0117 0zM8.25 9.75A.75.75 0 019 9h.253a1.75 1.75 0 011.709 2.13l-.46 2.066a.25.25 0 00.245.304H11a.75.75 0 010 1.5h-.253a1.75 1.75 0 01-1.709-2.13l.46-2.066a.25.25 0 00-.245-.304H9a.75.75 0 01-.75-.75zM10 7a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                    <div><b>Info.</b> Token has been copied into clipboard.</div>
                    <button class="ml-auto" x-on:click="showAlert = false">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                            <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                        </svg>
                    </button>
                </div>
            </template>
            <div class="flex gap-3">
                <a href="{{ route('admin.token.index') }}" class="rounded-full border border-blue-slate bg-primary p-4 text-center text-lg font-medium text-white shadow-sm transition-all hover:border-slate-700 hover:bg-slate-700 focus:ring focus:ring-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 24 24">
                        <path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path>
                    </svg>
                </a>
                <button type="button" @click="copy(); showAlert = true; setTimeout(() => showAlert = false, 5000)" class="rounded-full border border-slate-500 bg-primary p-4 text-center text-lg font-medium text-white shadow-sm transition-all hover:border-slate-700 hover:bg-slate-700 focus:ring focus:ring-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-white" viewBox="0 0 24 24">
                        <path d="M20 2H10c-1.103 0-2 .897-2 2v4H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2v-4h4c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zM4 20V10h10l.002 10H4zm16-6h-4v-4c0-1.103-.897-2-2-2h-4V4h10v10z"></path><path d="M6 12h6v2H6zm0 4h6v2H6z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </x-dashboard-shell>
    <script>
        function copy() {
            const text = document.querySelector("#token").innerText;
            navigator.clipboard.writeText(text)
        }
    </script>
</x-app>
