<x-layouts.public :title="$title">
    <section class="flex px-5 md:px-10 xl:px-36 mt-[70px]">
        <div class="bg-black text-white p-12 w-1/2 self-start">
            <h1 class="mb-6 text-4xl font-bold mx-auto">Send a News Tip</h1>
            <p class="text-lg">Help us uncover the stories that matter. Your information is
                protected.</p>
            <form action="">
                <div class="mt-4">
                    <label for="name" class="block mb-2">Full Name</label>
                    <input type="text" id="name" class="w-full p-4 bg-white text-black" placeholder="Enter your full name">
                </div>
                <div class="mt-4">
                    <label for="email" class="block mb-2">Email</label>
                    <input type="email" id="email" class="w-full p-4 text-black bg-white" placeholder="Enter your email address">
                </div>
                <div class="mt-4">
                    <label for="category" class="block mb-2">Category</label>
                    <select name="category" id="category" class="w-full bg-white text-black p-4">
                        <option selected>Select suitable category</option>
                        <option value="politics">Politics</option>
                        <option value="sports">Sports</option>
                        <option value="bussiness">Bussiness</option>
                    </select>
                </div>
                <div class="mt-4">
                    <label for="message" class="block mb-2">Your Message</label>
                    <textarea class="w-full px-4 py-3 bg-white text-black" placeholder="Write your message here"></textarea>
                </div>
                <button type="submit" class="btn-secondary w-full mt-4 py-4">Submit</button>
            </form>
        </div>
        <div class="p-12 w-1/2">
            <h1 class="mb-6 text-4xl font-bold mx-auto">Other Ways to Connect</h1>
            <p class="max-w-[43ch] text-lg">Reach out to the right department for faster assistance.</p>
            {{-- Editorial --}}
            <div class="mt-5">
                <h2 class="text-xl inline-flex items-center font-semibold">
                    <span class="material-symbols-outlined mr-2">
                        stacked_email
                    </span>
                    Editorial Team Emails
                </h2>
                <div class="bg-gray-50 p-8 max-w-md">
                    <dl class="grid grid-cols-[max-content_1fr] gap-x-8 gap-y-3">
                        <dt class="text-black">News Desk:</dt>
                        <dd class="text-black font-medium">
                            <a href="mailto:news@newsportal.com" class="hover:text-blue-600 transition-colors">
                                news@kesit.com
                            </a>
                        </dd>
                        <dt class="text-black">Investigations:</dt>
                        <dd class="text-black font-medium">
                            <a href="mailto:news@newsportal.com" class="hover:text-blue-600 transition-colors">
                                investigation@kesit.com
                            </a>
                        </dd>
                        <dt class="text-black">Opinion:</dt>
                        <dd class="text-black font-medium">
                            <a href="mailto:news@newsportal.com" class="hover:text-blue-600 transition-colors">
                                opinion@kesit.com
                            </a>
                        </dd>
                        <dt class="text-black">Features:</dt>
                        <dd class="text-black font-medium">
                            <a href="mailto:news@newsportal.com" class="hover:text-blue-600 transition-colors">
                                features@kesit.com
                            </a>
                        </dd>
                    </dl>
                </div>
            </div>

            {{-- Advertising --}}
            <div class="mt-5">
                <h2 class="text-xl inline-flex items-center font-semibold">
                    <span class="material-symbols-outlined mr-2">
                        campaign
                    </span>
                    Advertising Inquiries
                </h2>
                <div class="bg-gray-50 p-8 max-w-md">
                    <dl class="grid grid-cols-[max-content_1fr] gap-x-8 gap-y-3">
                        <dt class="text-black">General:</dt>
                        <dd class="text-black font-medium">
                            <a href="mailto:news@newsportal.com" class="hover:text-blue-600 transition-colors">
                                ads@kesit.com
                            </a>
                        </dd>
                        <dt class="text-black">Partnerships:</dt>
                        <dd class="text-black font-medium">
                            <a href="mailto:news@newsportal.com" class="hover:text-blue-600 transition-colors">
                                partnerships@kesit.com
                            </a>
                        </dd>
                        <dt class="text-black">Phone:</dt>
                        <dd class="text-black font-medium">
                            <p class="hover:text-blue-600 transition-colors">
                                +62 817 875 645
                            </p>
                        </dd>
                    </dl>
                </div>
            </div>

            {{-- Technical --}}
            <div class="mt-5">
                <h2 class="text-xl inline-flex items-center font-semibold">
                    <span class="material-symbols-outlined mr-2">
                        support_agent
                    </span>
                    Technical Support
                </h2>
                <div class="bg-gray-50 p-8 max-w-md">
                    <dl class="grid grid-cols-[max-content_1fr] gap-x-8 gap-y-3">
                        <dt class="text-black">Held Desk:</dt>
                        <dd class="text-black font-medium">
                            <a href="mailto:news@newsportal.com" class="hover:text-blue-600 transition-colors">
                                support@kesit.com
                            </a>
                        </dd>
                        <dt class="text-black">Subscriptions:</dt>
                        <dd class="text-black font-medium">
                            <a href="mailto:news@newsportal.com" class="hover:text-blue-600 transition-colors">
                                subscriptions@kesit.com
                            </a>
                        </dd>
                        <dt class="text-black">Work Hours:</dt>
                        <dd class="text-black font-medium">
                            <p class="hover:text-blue-600 transition-colors">
                                Monday-Friday, 8AM-4PM WIB
                            </p>
                        </dd>
                    </dl>
                </div>
            </div>

            {{-- Location --}}
            <div class="mt-5 border-t-1 border-black pt-5">
                <h2 class="text-xl inline-flex items-center font-semibold">
                    <span class="material-symbols-outlined mr-2">
                        apartment
                    </span>
                    Main Office
                </h2>
                <div class="py-3 px-8">
                    <p>Journalist Center Building,</p>
                    <p>Pare-Wates Road No.Km. 7, Karangnongko, Sumber Agung,</p>
                    <p>Plosoklaten District, Kediri Regency, East Java 64175</p>
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>
