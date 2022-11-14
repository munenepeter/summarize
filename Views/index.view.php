<?php include_once 'base.view.php';?>
<body class="h-screen bg-gray-50">

    <div class="overflow-y-auto overflow-x-hidden grid gap-2 lg:grid-cols-2 justify-center items-center w-full">
        <!-- Form-->
        <div class="p-4 w-full max-w-2xl h-full md:h-auto">
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Add URLS
                    </h3>
                </div>
                <form action="#" id="urlForm">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label for="url1" class="block mb-2 text-sm font-medium text-gray-900 ">URL
                                to Article#1</label>
                            <input type="url" name="url1" id="url1"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="https://example.com">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="url2" class="block mb-2 text-sm font-medium text-gray-900 ">URL
                                to Article#2</label>
                            <input type="url" name="url2" id="url2"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="https://example.com">
                        </div>
                    </div>
                    <div class="pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600 flex justify-end">
                        <button id="addURLInput"
                            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                            Add URL
                        </button>
                    </div>

                    <button type="submit" id="submitForm"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Generate Summaries
                    </button>

                </form>
            </div>
        </div>
        <!-- article contents -->
        <section class="bg-white rounded-lg border border-gray-200 shadow-md">
            <div class="py-8 px-2 mx-auto">
                <div class="mx-auto text-center mb-4">
                    <h2 class="mb-2 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 ">
                        {{ name }}</h2>
                    <p class="font-light text-gray-500 sm:text-xl ">We use an agile approach</p>
                </div>
                <div class="">
                    <article class="p-6 bg-gray-50 rounded-lg border border-gray-200 ">
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                            <span
                                class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                                    </path>
                                </svg>
                                URL #1
                            </span>
                            <span class="text-sm">14 days ago</span>
                        </div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 "><a href="#">How
                                to quickly deploy a static website</a></h2>
                        <p class="mb-5 font-light text-gray-500 ">Static websites are now used to bootstrap lots of
                            websites and are becoming the basis for a variety of tools that even influence both web
                            designers and developers influence both web designers and developers.</p>
                        <div class="flex justify-end items-center">

                            <a href="#"
                                class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                Read more
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </article>

                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <script>
        $("#urlForm").submit(function (event) {
            event.preventDefault();

            $.post("/getUrl", {
                    url1:"https://example.com",
                },
                function (data, status) {
                    console.log(data);
                });
        });
    </script>
</body>

</html>