<x-layouts.public :title="$title">
    <section class="px-5 md:px-10 xl:px-36 py-12 mb-12">
        {{-- Title --}}
        <h1 class="text-5xl font-bold text-center">{{ $title }}</h1>

        {{-- Headline --}}
        <section class="flex gap-12 border-b py-10">
            <img src="https://placehold.co/1920x1080" alt="" class="h-96">
            <div class="flex flex-col gap-6 justify-center">
                <h1 class="text-4xl font-bold">Senate Reaches Bipartisan Spending Bill</h1>
                <p class="max-w-[70ch]">
                    After months of heated negotiations, lawmakers from both parties have
                    reached a preliminary agreement on a comprehensive infrastructure
                    package worth $1.2 trillion. The deal includes significant investments in
                    roads, bridges, broadband expansion, and climate resilience measures,
                    marking a rare moment of bipartisan cooperation in an increasingly
                    polarized political landscape.
                </p>
                <p class="inline-flex gap-6 text-sm">
                    <span class="font-medium">by Journalist Name</span>
                    <span class="text-gray-500">December, 23 2025</span>
                    <span class="text-gray-500">3 mins read</span>
                </p>
            </div>
        </section>

        <section class="flex mt-10 gap-20">
            {{-- Latest News --}}
            <div class="w-2/3 border-r pr-12">
                <h1 class="text-2xl font-bold pb-4 mb-6 border-b">Latest News</h1>
                {{-- item row --}}
                <a href="" class="flex flex-col gap-4 items-start group">
                    <img src="https://placehold.co/1920x1080" alt="" class="h-48 group-hover:opacity-80">
                    <h1 class="text-xl font-bold group-hover:underline">The Political Calculus Behind Infrastructure Compromise</h1>
                    <p class="max-w-[65ch]">
                        The bipartisan infrastructure agreement represents more than policy
                        victory—it signals a strategic shift in how both parties approach
                        governance in a divided Congress.
                    </p>
                    <p class="inline-flex gap-6 text-sm">
                        <span class="font-medium">by Journalist Name</span>
                        <span class="text-gray-500">December, 23 2025</span>
                        <span class="text-gray-500">3 mins read</span>
                    </p>
                </a>
            </div>

            {{-- Recommendation --}}
            <div class="w-1/3">
                <h1 class="text-2xl font-bold pb-4 mb-6 border-b">You may also like</h1>
                {{-- item row --}}
                <a href="" class="flex flex-col gap-4 items-start group">
                    <h1 class="text-xl font-bold group-hover:underline">House Committee Advances Voting
                        Rights Bill</h1>
                    <p>
                        The legislation faces uncertain
                        prospects in the Senate despite
                        bipartisan support in committee.
                    </p>
                    <p class="inline-flex gap-6 text-sm">
                        <span class="font-medium">by Journalist Name</span>
                        <span class="text-gray-500">December, 23 2025</span>
                        <span class="text-gray-500">3 mins read</span>
                    </p>
                </div>
            </div>
        </section>


    </section>
</x-layouts.public>
