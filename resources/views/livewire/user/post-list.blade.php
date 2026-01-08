<div>
    {{-- Searchbar --}}
    <form action="" method="get" class="w-full flex">
        <input
            type="text"
            name="keyword"
            class="border-2 border-gray-300 hover:border-black focus:border-black focus:outline-none focus:ring-0 p-3 w-full"
            placeholder="Search from your draft"
        >
        <button class="btn-primary px-3 py-0">
            <span class="material-symbols-outlined mt-2">search</span>
        </button>
    </form>

    {{-- Post List --}}
    <section class="flex flex-col gap-8 mt-12">
        {{-- Card Item --}}
        <a href="" class="px-8 py-4 hover:shadow-lg border-l-2 block">
            <p class="badge bg-green-100 text-green-700">Published</p>
            <h1 class="text-2xl font-bold mt-2">Title of the Post</h1>
            <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </a>
        <a href="" class="px-8 py-4 hover:shadow-lg border-l-2 block">
            <p class="badge bg-gray-100 text-gray-700">Draft</p>
            <h1 class="text-2xl font-bold mt-2">Title of the Post</h1>
            <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </a>
    </section>
</div>
