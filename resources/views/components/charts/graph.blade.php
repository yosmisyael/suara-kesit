@props(['id', 'data', 'labels', 'title' => '', 'height' => 300])

<div class="shadow-lg p-4 w-full rounded-b-xl border-t-4"
    x-data="{
        chart: null,
        init() {
            let options = {
                series: [{ name: '{{ $title }}', data: @js($data) }],
                chart: { type: 'area', height: '{{ $height }}', toolbar: { show: false } },
                dataLabels: { enabled: false },
                stroke: { curve: 'smooth' },
                xaxis: { categories: @js($labels) },
                tooltip: { theme: 'light' }
            };

            this.chart = new ApexCharts(this.$refs.chart, options);
            this.chart.render();

            // Watch for Livewire updates to the 'data' prop
            this.$watch('data', (newData) => {
                this.chart.updateSeries([{ data: newData }]);
            });
        }
    }"
    wire:ignore
>
    <h1 class="text-xl font-bold">{{ $title }}</h1>
    <div x-ref="chart"></div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</div>
