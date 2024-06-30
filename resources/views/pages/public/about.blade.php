<x-app>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-shell>
        <div class="w-full bg-black h-60 flex items-center justify-center relative mt-10">
            <h1 class="md:text-4xl text-2xl font-black text-white uppercase">About Us</h1>
            <img src="{{ asset('kesit.png') }}" alt="logo" class="absolute bottom-0 h-52 translate-y-1/2">
        </div>
        <div class="mt-32 flex gap-3 md:flex-row flex-col">
            <p class="first-letter:float-left first-letter:text-5xl first-letter:pr-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto assumenda dignissimos eius et eveniet excepturi facere incidunt ipsa laboriosam magni maxime, molestiae molestias mollitia, nostrum officia omnis sapiente suscipit tenetur? Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab accusamus, aspernatur blanditiis cupiditate dicta eos hic in iste iure maxime minima odit perferendis, possimus quas quasi rerum veniam vitae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab animi atque beatae cum delectus doloremque eaque eos est exercitationem facere labore laudantium libero mollitia, provident, quae quos recusandae, tempora ullam?</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores cupiditate dolorum eligendi error et, hic illum, ipsum libero minus modi nobis nostrum quas quia quis quod repellat saepe tempore tenetur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores autem cumque eveniet ipsam labore non provident quaerat qui quibusdam recusandae repellendus, reprehenderit tempora tempore tenetur voluptas! Ab accusamus aut cum doloribus eaque facilis minus neque quas, repellendus tenetur? Rem, reprehenderit!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium ad adipisci animi assumenda beatae debitis deleniti error eveniet non omnis quae, quo ratione repellendus sed sit tempore tenetur! Ab accusamus, aliquam asperiores corporis culpa debitis dicta ea eligendi fugiat labore maxime, molestiae nam natus nisi obcaecati quae, quisquam ratione. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consectetur cum dolore eos explicabo, ipsam magni pariatur porro quas, reiciendis rem totam velit voluptatibus. Expedita fuga inventore porro sunt tempora. Consectetur dolores eveniet praesentium quas, quia quo sapiente temporibus voluptates?</p>
        </div>

    </x-shell>
</x-app>
