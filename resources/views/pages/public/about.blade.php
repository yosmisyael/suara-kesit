<x-layouts.public :title="$title">
    {{-- header --}}
    <section class="mt-32 mb-20 text-center">
        <h1 class="text-6xl font-bold">Truth in Reporting</h1>
        <p class="mx-auto mt-6 text-lg max-w-[45ch]">Delivering unbiased, fact-checked journalism that empowers readers
            to make informed decisions in an ever-changing world</p>
    </section>

    {{-- story --}}
    <section class="px-5 md:px-10 xl:px-36 flex gap-12 py-12">
        <div class="flex-1">
            <h2 class="mb-6 text-4xl font-bold">Our Story</h2>
            <div class="flex flex-col gap-6 text-lg">
                <p>
                    Founded in 2021, Veritas emerged from a simple belief: that quality journalism is the cornerstone of
                    a functioning democracy. In an era of information overload and digital noise, we recognized the
                    urgent need for a news source that prioritizes accuracy, transparency, and ethical reporting above
                    all else.
                </p>
                <p>
                    What began as a small team of dedicated journalists has grown into a globally recognized news
                    organization, serving millions of readers across six continents. Our commitment remains unchanged
                    —to tell stories that matter, to hold power accountable, and to give voice to the voiceless.
                </p>
                <p>
                    We believe that journalism is not just about reporting facts; it's about context, nuance, and the
                    human stories behind the headlines. Every article we publish undergoes rigorous fact- checking and
                    editorial review, ensuring that our readers receive nothing less than the truth.
                </p>
                <p>
                    Today, we continue to evolve, embracing new technologies and storytelling formats while staying true
                    to our foundational principles. Our newsroom is a diverse collective of reporters, editors,
                    photographers, and data journalists—all united by a shared passion for excellence in journalism.
                </p>
            </div>
        </div>
        <div class="w-1/2">
            <img src="{{ asset('kesit.png') }}" alt="organization logo" class="h-[600px] mx-auto">
        </div>
    </section>

    {{-- ethics --}}
    <section class="px-5 md:px-10 xl:px-36 py-12 bg-black text-white">
        <div class="text-center">
            <h2 class="mb-6 text-4xl font-bold">Our Ethics Code</h2>
            <p class="mx-auto text-lg max-w-[45ch]">The principles that guide every story we tell and every decision we
                make</p>
        </div>
        <div class="flex gap-12 justify-center py-16">
            {{-- critics --}}
            <div class="flex flex-col gap-4 justify-center text-center w-fit">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="stroke-white mx-auto fill-black h-24 w-24 p-3 border border-white" viewBox="0 0 24 24"
                     fill="none">
                    <path
                        d="M12 7C7.60743 7 4.49054 10.5081 3.41345 11.9208C3.15417 12.2609 3.17881 12.7211 3.4696 13.0347C4.66556 14.3243 8.01521 17.5 12 17.5C15.9848 17.5 19.3344 14.3243 20.5304 13.0347C20.8212 12.7211 20.8458 12.2609 20.5865 11.9208C19.5095 10.5081 16.3926 7 12 7Z"
                        stroke-width="2"/>
                    <path
                        d="M14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12Z"/>
                </svg>
                <h3 class="text-2xl font-bold">Critical - Kritis</h3>
                <p class="max-w-[35ch] mx-auto">We clearly disclose our methods, sources, and potential conflicts of
                    interest in our reporting.</p>
            </div>
            {{-- expresive --}}
            <div class="flex flex-col gap-4 justify-center text-center w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                     class="stroke-white mx-auto fill-black h-24 w-24 p-3 border border-white">
                    <path
                        d="M24.064 6.583l-3.773 8.375h-1.098l4.024-8.916h-6.213v20.771c1.28 0.047 7.813 2.167 7.813 2.167v1.020h-17.56v-1.089c0 0 6.678-2.099 7.684-2.099v-20.77h-6.015l4.025 8.916h-1.098l-3.773-8.375-3.773 8.375h-1.098l4.048-8.966v-1.034h6.754c0-1.353 0.907-2.458 1.965-2.458 1.119 0 1.965 1.168 1.965 2.458h6.878v0.887l4.116 9.113h-1.098l-3.773-8.375zM13.020 15.979c0 2.693-1.868 5.282-4.939 5.282-3.002 0-4.939-2.589-4.939-5.282-0.001 0.004 9.878 0.004 9.878 0zM19.262 15.979c0 0.005 9.879 0.005 9.879 0 0 2.693-1.868 5.282-4.939 5.282-3.003 0-4.94-2.589-4.94-5.282z"/>
                </svg>
                <h3 class="text-2xl font-bold">Expressive - Ekpresif</h3>
                <p class="max-w-[35ch] mx-auto">We treat all subjects with respect, especially vulnerable individuals
                    and communities.</p>
            </div>
            {{-- solidarity --}}
            <div class="flex flex-col gap-4 justify-center text-center w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     class="stroke-white mx-auto fill-white h-24 w-24 p-3 border border-white" id="_x32_"
                     viewBox="0 0 512 512" xml:space="preserve">
                        <g>
                            <path class="st0"
                                  d="M386.234,78.954l-49.861,49.861l4.635,4.814c-3.302,2.667-6.644,5.269-9.888,7.579   c-5.236,3.74-10.262,6.74-13.669,8.147c-0.22,0.098-1.146,0.358-2.984,0.35c-2.936,0.032-7.847-0.716-13.864-1.634   c-6.042-0.911-13.27-1.902-21.417-1.911c-7.108-0.024-14.946,0.838-23.199,3.106c-8.236-2.26-16.059-3.106-23.149-3.097   c-8.156,0-15.384,0.992-21.426,1.911c-6.017,0.918-10.92,1.667-13.855,1.634c-1.846,0.016-2.765-0.26-2.952-0.35   c-3.635-1.488-9.116-4.806-14.758-8.912c-2.919-2.122-5.895-4.448-8.847-6.838l4.627-4.798l-49.861-49.861L0,209.216l49.861,49.861   l14.595-15.116l32.216,28.117c0.902,5.391,2.602,10.481,4.562,15.312c1.276,3.074,2.675,6.033,4.107,8.814   c-3.115,5.156-4.814,11.043-4.798,17.011c-0.008,5.92,1.618,11.969,4.96,17.344c5.082,8.172,13.222,13.311,22.011,14.937   c0.05,5.814,1.66,11.742,4.936,17.011c6.221,10.002,16.987,15.547,27.964,15.53c0.423,0,0.854-0.065,1.276-0.081   c0.553,4.651,2.082,9.286,4.7,13.498c6.221,10.001,16.994,15.547,27.955,15.53c1.09,0,2.172-0.114,3.269-0.22   c0.52,4.188,1.911,8.367,4.261,12.14c5.668,9.108,15.474,14.165,25.45,14.141c5.383,0.008,10.896-1.456,15.791-4.497l14.946-9.301   c2.944,1.902,6.033,3.577,9.277,4.943c6.042,2.545,12.571,4.106,19.361,4.114c7.448,0.033,15.311-2.008,22.076-6.765   c4.407-3.073,8.139-7.286,11.196-12.253c0.472,0.016,0.854,0.098,1.342,0.106c3.098,0,6.497-0.464,9.864-1.513   c3.39-1.032,6.757-2.578,10.351-4.634c8.57-4.83,13.709-11.937,16.206-18.027c0.553-1.333,0.951-2.586,1.309-3.797   c2.074-0.658,4.058-1.464,5.854-2.504c6.627-3.814,10.945-9.611,13.604-15.433c2.667-5.88,3.838-11.986,3.854-17.856   c0-0.578-0.073-1.139-0.098-1.708c4.334-1.772,8.228-4.236,11.546-7.139c3.399-2.977,6.253-6.44,8.375-10.392   c2.115-3.935,3.53-8.44,3.538-13.375c0.008-3.212-0.651-6.595-2.09-9.766c-0.464-1.008-1.122-1.935-1.724-2.87   c2.53-4.53,5.106-9.635,7.22-15.148c1.586-4.172,2.92-8.546,3.684-13.141l33.59-29.313l15.742,16.303L512,209.216L386.234,78.954z    M138.744,320.428l-0.578,0.366c-1.504,0.928-3.082,1.342-4.708,1.35c-3.017-0.016-5.912-1.488-7.611-4.228   c-0.927-1.504-1.35-3.09-1.35-4.7c0.016-3.033,1.48-5.912,4.212-7.611l19.751-12.27c1.504-0.935,3.082-1.341,4.691-1.358   c3.033,0.032,5.912,1.48,7.62,4.236l10.172-6.318l-10.172,6.326c0.927,1.496,1.341,3.073,1.35,4.684   c-0.017,2.114-0.773,4.131-2.138,5.757L143.02,317.2C141.476,318.159,140.069,319.273,138.744,320.428z M165.113,352.733   c-1.504,0.927-3.082,1.35-4.7,1.35c-3.025-0.016-5.919-1.48-7.619-4.22c-0.928-1.504-1.342-3.098-1.35-4.708   c0.007-2.097,0.764-4.114,2.122-5.724l16.97-10.562c1.537-0.952,2.928-2.057,4.253-3.212l0.618-0.374   c1.504-0.935,3.09-1.35,4.692-1.35c3.041,0.016,5.911,1.48,7.618,4.228c0.927,1.504,1.342,3.073,1.35,4.692   c-0.016,3.016-1.471,5.911-4.236,7.627L165.113,352.733z M218.771,369.419l-19.726,12.262c-1.496,0.928-3.074,1.35-4.7,1.35   c-3.017-0.016-5.912-1.48-7.611-4.22c-0.927-1.512-1.341-3.09-1.35-4.708c0.025-3.033,1.48-5.903,4.212-7.611l19.751-12.27   c1.504-0.935,3.082-1.341,4.691-1.341c3.033,0.007,5.912,1.471,7.62,4.22c0.926,1.505,1.341,3.082,1.35,4.7   C222.991,364.816,221.536,367.694,218.771,369.419z M249.353,389.421c0.625,1,0.894,2.041,0.902,3.13   c-0.016,2.025-0.984,3.952-2.846,5.115l-16.938,10.521c-1.008,0.634-2.049,0.902-3.147,0.902c-2.032-0.008-3.959-0.992-5.106-2.829   c-0.626-1.017-0.895-2.058-0.903-3.146c0.024-2.042,0.992-3.953,2.821-5.091h0.008l16.954-10.538   c1.033-0.642,2.066-0.911,3.147-0.911c2.041,0.016,3.952,0.984,5.098,2.83l10.18-6.31L249.353,389.421z M381.071,315.061   c-0.87,1.683-2.854,3.878-5.366,5.415c-2.513,1.554-5.432,2.464-8.229,2.456c-0.993,0-1.952,0.17-2.887,0.414   c-1.708-0.374-3.416-0.894-5.098-1.561c-5.212-2.033-10.082-5.326-13.522-8.107c-1.724-1.39-3.09-2.642-4.001-3.512l-1.008-1   l-0.22-0.228l-0.033-0.032H340.7c-3.351-3.643-9.026-3.887-12.677-0.537c-3.651,3.351-3.903,9.026-0.544,12.701   c0.3,0.309,4.814,5.236,12.205,10.311c3.708,2.537,8.139,5.123,13.237,7.123c1.179,0.464,2.407,0.894,3.668,1.285   c0.35,0.788,0.797,1.537,1.325,2.244l-0.024,0.017c0.065,0.048,0.553,1.594,0.512,3.578c0.058,3.309-1.146,7.643-2.878,10.033   c-0.845,1.22-1.707,1.992-2.544,2.472c-0.854,0.472-1.716,0.781-3.334,0.805l-0.578-0.008c-0.342-0.016-0.666,0.041-1,0.057   c-0.016,0-0.024,0-0.024,0c-7.79,0.033-15.042-3.309-20.393-6.968c-2.667-1.805-4.806-3.643-6.245-4.992   c-0.708-0.667-1.252-1.22-1.586-1.561l-0.349-0.374l-0.057-0.073h-0.008c-3.244-3.724-8.895-4.131-12.644-0.886   c-3.757,3.252-4.163,8.92-0.911,12.676l-0.008-0.007c0.35,0.39,4.497,5.17,11.71,10.082c4.748,3.211,10.944,6.537,18.303,8.456   c-0.081,0.212-0.13,0.423-0.228,0.635c-0.943,2.13-2.293,4.325-5.968,6.472c-2.481,1.416-4.253,2.155-5.497,2.529   c-1.252,0.374-1.951,0.448-2.846,0.455c-1.162,0.017-2.911-0.244-5.822-0.838c-0.528-0.113-1.056-0.146-1.585-0.178   c-0.196-0.082-0.382-0.155-0.594-0.261c-2.976-1.399-6.603-3.928-9.278-6.082c-1.342-1.065-2.48-2.041-3.261-2.732l-0.878-0.797   l-0.203-0.195l-0.041-0.032c-3.586-3.431-9.278-3.301-12.709,0.284c-3.423,3.586-3.293,9.278,0.293,12.701   c0.187,0.17,3.968,3.798,9.269,7.603c0.943,0.667,1.984,1.342,3.025,2.008c-1.464,2.334-2.992,3.936-4.488,5.001   c-2.391,1.643-4.993,2.423-8.343,2.44c-3,0.008-6.53-0.732-10.058-2.228c-1.171-0.488-2.317-1.179-3.472-1.821   c0.675-2.521,1.049-5.131,1.041-7.75c0.008-5.391-1.472-10.904-4.513-15.791c-5.163-8.302-13.774-13.181-22.792-13.978   c0-0.326,0.056-0.65,0.056-0.984c0.008-5.911-1.618-11.977-4.952-17.344v0.017c-6.228-10.034-17.011-15.58-27.972-15.556   c-0.422,0-0.854,0.073-1.276,0.09c-0.553-4.66-2.082-9.278-4.699-13.49h0.007c-5.082-8.188-13.229-13.326-22.019-14.937   c-0.056-5.814-1.658-11.742-4.936-17.011h0.008c-6.22-10.009-17.011-15.563-27.972-15.547c-5.928,0-11.969,1.627-17.344,4.96   l-11.538,7.172c-0.277-0.634-0.626-1.252-0.878-1.887c-2.008-4.805-3.269-9.546-3.407-12.814l-0.268-5.058l-38.598-33.695   l73.18-75.792c3.741,3.066,7.579,6.107,11.515,8.953c6.521,4.7,12.985,8.847,19.588,11.628c4.237,1.748,8.367,2.179,12.157,2.187   c6.066-0.024,11.627-1.065,17.425-1.911c0.374-0.065,0.764-0.097,1.146-0.155c-7.968,6.838-14.921,14.238-20.8,21.126   c-4.952,5.814-9.131,11.294-12.441,15.766c-3.268,4.448-5.789,8.034-6.895,9.449c-5.448,7.09-7.789,15.571-7.838,24.068   c0.024,7.904,2.122,16.132,7.57,23.085c2.716,3.439,6.326,6.448,10.635,8.497c4.302,2.065,9.229,3.122,14.36,3.122   c6.367-0.017,13.042-1.561,20.109-4.53c22.182-9.383,45.047-15.636,62.252-19.49c8.603-1.919,15.799-3.252,20.816-4.09   c0.944-0.155,1.732-0.285,2.513-0.414l75.271,64.888l0.032,0.016l0.025,0.041C381.73,313.378,381.615,314.053,381.071,315.061z    M389.78,260.395l-0.261,5.058c-0.138,2.894-1.122,6.976-2.773,11.205c-0.838,2.211-1.862,4.44-2.935,6.634l-65.92-56.821   c-2.561-2.211-5.976-3.236-9.334-2.813c-0.585,0.114-48.934,6.18-97.047,26.46c-4.789,2.024-8.383,2.65-10.79,2.634   c-1.959,0-3.155-0.35-4.041-0.773c-1.285-0.626-2.204-1.513-3.114-3.212c-0.87-1.674-1.464-4.146-1.455-6.748   c-0.049-3.74,1.285-7.546,2.78-9.35c1.863-2.407,4.139-5.692,7.278-9.937c4.658-6.31,10.985-14.474,18.53-22.418   c7.529-7.944,16.287-15.636,25.467-21.036c12.417-7.293,22.996-9.123,33.022-9.156c6.171-0.008,12.09,0.764,17.864,1.634   c5.789,0.854,11.367,1.878,17.417,1.911c3.781-0.008,7.887-0.439,12.108-2.163l0.056-0.016c6.603-2.781,13.067-6.928,19.588-11.628   c3.912-2.83,7.766-5.887,11.49-8.944l72.035,74.604L389.78,260.395z"/>
                        </g>
                    </svg>
                <h3 class="text-2xl font-bold">Solidarity - Solidaritas</h3>
                <p class="max-w-[35ch] mx-auto">We present multiple perspectives and give subjects of our reporting the
                    opportunity to respond.</p>
            </div>
        </div>
        <div class="flex gap-12 justify-center">
            {{-- inovative --}}
            <div class="flex flex-col gap-4 justify-center text-center w-fit">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="stroke-white mx-auto fill-black h-24 w-24 p-3 border border-white" viewBox="0 0 24 24"
                     fill="none">
                    <path d="M4 7L12 3L20 7C20 12.1932 17.2157 19.5098 12 21C6.78428 19.5098 4 12.1932 4 7Z"
                          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h3 class="text-2xl font-bold">Innovative - Inovatif</h3>
                <p class="max-w-[35ch] mx-auto">Our journalism is free from commercial and political influence. We serve
                    our readers, not special interests.</p>
            </div>
            {{-- responsible --}}
            <div class="flex flex-col gap-4 justify-center text-center w-fit">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="stroke-white mx-auto fill-black h-24 w-24 p-3 border border-white" viewBox="0 0 16 16"
                     fill="none">
                    <path d="M16 8L13 11L10 10L6 6L5 3L8 0L11 1L15 5L16 8Z"/>
                    <path d="M0 13L5.08579 7.91418L8.08579 10.9142L3 16L0 13Z"/>
                </svg>
                <h3 class="text-2xl font-bold">Responsible - Tanggung Jawab</h3>
                <p class="max-w-[35ch] mx-auto">We hold ourselves to the same standards we expect from those we cover.
                    Reader feedback matters.</p>
            </div>
        </div>
    </section>

    {{-- team --}}
    <section class="px-5 md:px-10 xl:px-36 flex gap-12 py-12 justify-center">
        <img src="https://placehold.co/450x450" alt="our team">
        <div>
            <h2 class="mb-6 text-4xl font-bold">A Team United by Purpose</h2>
            <div class="flex flex-col gap-6 text-lg">
                <p class="max-w-[43ch]">Our newsroom is home to over 200 journalists, editors, photographers, and
                    support staff from 35 countries. This diversity isn't just a statistic—it's our strength, enabling
                    us to cover global stories with local insight and cultural sensitivity.</p>
                <p class="max-w-[43ch]">We invest heavily in our people, providing ongoing training in investigative
                    techniques, data journalism, and digital storytelling. Our journalists have won numerous
                    international awards, but what we're most proud of is the trust our readers place in us daily.</p>
                <p class="max-w-[43ch]">From conflict zones to corporate boardrooms, our reporters go where the story
                    leads, always guided by our ethical principles and commitment to truth.</p>
            </div>
        </div>
    </section>

    {{-- stats --}}
    <section class="px-5 md:px-10 xl:px-36 py-12">
        <h2 class="mb-6 text-4xl font-bold text-center">By the Numbers</h2>
        <div class="flex justify-center pt-6">
            <div class="text-center px-24">
                <h3 class="text-4xl font-bold">5</h3>
                <p class="pt-3">Years of Experience</p>
            </div>
            <div class="text-center px-24 border-r-2 border-l-2 border-black">
                <h3 class="text-4xl font-bold">50+</h3>
                <p class="pt-3">Journalist Member</p>
            </div>
            <div class="text-center px-24 border-r-2 border-black">
                <h3 class="text-4xl font-bold">1000+</h3>
                <p class="pt-3">Monthly Readers</p>
            </div>
            <div class="text-center px-24">
                <h3 class="text-4xl font-bold">5+</h3>
                <p class="pt-3">Student Journalist Award</p>
            </div>
        </div>
    </section>

    {{-- subscribe --}}
    <section class="px-5 md:px-10 xl:px-36 py-12 text-white">
        <div class="bg-black py-16 mx-36">
            <h2 class="mb-6 text-center text-4xl font-bold mx-auto">Stay Informed</h2>
            <p class="text-center max-w-[43ch] mx-auto text-lg">Join over 500,000 subscribers who receive our daily
                newsletter with the most important stories of the day</p>
            <form action="" class="mx-auto text-center py-6">
                <input type="email" placeholder="youremail@example.com" class="min-w-80 mr-3 bg-white py-2 px-4 text-black">
                <button type="submit" class="btn-secondary">Subscribe</button>
            </form>
            <p class="text-center">Free forever. Unsubscribe anytime. We respect your privacy.</p>
        </div>
    </section>
</x-layouts.public>
