<div>
    {{-- Analytics Cards --}}
    <section class="grid grid-cols-4 gap-4">
        <div class="text-lg flex justify-between items-center rounded-b-lg border-t-4 shadow-md px-4 py-8">
            <h2 class="font-bold">Published Post</h2>
            <p class="text-4xl font-bold">10</p>
        </div>
        <div class="text-lg flex justify-between items-center rounded-b-lg border-t-4 shadow-md px-4 py-8">
            <h2 class="font-bold">Total Post</h2>
            <p class="text-4xl font-bold">16</p>
        </div>
        <div class="text-lg flex justify-between items-center rounded-b-lg border-t-4 shadow-md px-4 py-8">
            <h2 class="font-bold">Monthly Reader</h2>
            <p class="text-4xl font-bold">8</p>
        </div>
        <div class="text-lg flex justify-between items-center rounded-b-lg border-t-4 shadow-md px-4 py-8">
            <h2 class="font-bold">Likes</h2>
            <p class="text-4xl font-bold">10</p>
        </div>
    </section>

    <section class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
        <x-charts.graph
            id="visitor"
            title="Visitor Trend"
            :data="$chartData"
            :labels="$chartLabels"
        />
        <x-charts.graph
            id="engagement"
            title="Overall Engagement"
            :data="$chartData"
            :labels="$chartLabels"
        />
    </section>
</div>
