<div class="px-5 md:px-10 xl:px-36">
    {{-- Header --}}
    <section class="col-span-1 md:col-span-3 border-b py-12">
        <h1 class="text-4xl font-bold">Welcome to KESIT!</h1>
        <p class="text-xl mt-4">Dive into the latest news and articles, curated just for you every day.</p>
        <p class="font-semibold mt-4">
            {{ $user->name }}
            <span class="bg-gray-200 inline-block ml-1 py-1 px-3 rounded-xl">
                Member since {{ $user->created_at->format('Y') }}
            </span>
            @foreach($user->getRoleNames() as $role)
                <span class="ml-1 px-3 py-1 font-semibold text-white bg-black inline-block rounded-xl">{{ str($role)->title() }}</span>
            @endforeach
        </p>
    </section>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 py-12">
        <section class="col-span-2">
            <h1 class="text-2xl font-bold pb-4 mb-6 border-b">Your Feeds</h1>
            <div class="mt-4 flex flex-col gap-3">
                <h2 class="text-xl font-semibold">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, veniam!</h2>
                <p class="max-w-[80ch]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab aperiam asperiores consectetur eos et ex fuga fugit minima modi neque, odit omnis reprehenderit similique tenetur vel, voluptatem. Animi aperiam, atque beatae fuga laudantium nisi odit sint voluptate! Aspernatur atque consequatur incidunt iusto libero quisquam saepe, voluptas? Libero, saepe sapiente?</p>
            </div>
        </section>
        <section>
            <h1 class="text-2xl font-bold pb-4 mb-6 border-b">Your Comments</h1>
            <div class="mt-4 flex flex-col gap-3">
                <h2 class="text-xl font-semibold">News Title</h2>
                <p class="max-w-[40ch]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda consequuntur culpa cum, deleniti deserunt eaque earum eos ex expedita inventore libero nihil officiis qui, quidem rem repudiandae rerum similique voluptates?</p>
                <p class="inline-flex gap-6 text-sm">
                    <span class="text-gray-500">25 minutes ago</span>
                </p>
            </div>
        </section>
    </div>
</div>
