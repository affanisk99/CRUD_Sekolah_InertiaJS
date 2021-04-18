<template>
    <app-layout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div
                        class="overflow-hidden bg-gray-200 divide-y divide-gray-200 rounded-lg shadow sm:divide-y-0 sm:grid sm:grid-cols-2 sm:gap-px"
                    >
                        <div
                            class="relative p-6 bg-white group focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500"
                        >
                            <div>
                                <span
                                    class="inline-flex p-3 text-green-700 rounded-lg bg-green-50 ring-4 ring-white"
                                >
                                    <!-- Heroicon name: user-group -->
                                    <svg
                                        class="w-6 h-6"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                                        />
                                    </svg>
                                </span>
                            </div>
                            <div class="mt-8">
                                <h3 class="text-lg font-medium">
                                    <inertia-link
                                        :href="route('company.index')"
                                        class="focus:outline-none"
                                    >
                                        <!-- Extend touch target to entire panel -->
                                        <span
                                            class="absolute inset-0"
                                            aria-hidden="true"
                                        ></span>
                                        Data Perusahaan
                                    </inertia-link>
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    Membuat dan menyunting data perusahaan
                                </p>
                            </div>
                            <span
                                class="absolute text-gray-300 pointer-events-none top-6 right-6 group-hover:text-gray-400"
                                aria-hidden="true"
                            >
                                <svg
                                    class="w-6 h-6"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z"
                                    />
                                </svg>
                            </span>
                        </div>

                        <div
                            class="relative p-6 bg-white rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500"
                        >
                            <div>
                                <span
                                    class="inline-flex p-3 text-purple-700 rounded-lg bg-purple-50 ring-4 ring-white"
                                >
                                    <!-- Heroicon name: user-group -->
                                    <svg
                                        class="w-6 h-6"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                                        />
                                    </svg>
                                </span>
                            </div>
                            <div class="mt-8">
                                <h3 class="text-lg font-medium">
                                    <inertia-link
                                        :href="route('master.department.index')
                                            
                                        "
                                        class="focus:outline-none"
                                    >
                                        <!-- Extend touch target to entire panel -->
                                        <span
                                            class="absolute inset-0"
                                            aria-hidden="true"
                                        ></span>
                                        Data Departemen
                                    </inertia-link>
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    Membuat dan menyunting data departemen.
                                </p>
                            </div>
                            <span
                                class="absolute text-gray-300 pointer-events-none top-6 right-6 group-hover:text-gray-400"
                                aria-hidden="true"
                            >
                                <svg
                                    class="w-6 h-6"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z"
                                    />
                                </svg>
                            </span>
                        </div>

                        <div
                            class="relative p-6 bg-white rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500"
                        >
                            <div>
                                <span
                                    class="inline-flex p-3 text-purple-700 rounded-lg bg-purple-50 ring-4 ring-white"
                                >
                                    <!-- Heroicon name: user-group -->
                                    <svg
                                        class="w-6 h-6"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24"
                                        fill="currentColor"
                                    >
                                        <path
                                            d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z"
                                        />
                                    </svg>
                                </span>
                            </div>
                            <div class="mt-8">
                                <h3 class="text-lg font-medium">
                                    <inertia-link
                                        :href="route('master.job_attribute.index')
                                            
                                        "
                                        class="focus:outline-none"
                                    >
                                        <!-- Extend touch target to entire panel -->
                                        <span
                                            class="absolute inset-0"
                                            aria-hidden="true"
                                        ></span>
                                        Data Job Attributes
                                    </inertia-link>
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    Membuat dan menyunting data job attributes.
                                </p>
                            </div>
                            <span
                                class="absolute text-gray-300 pointer-events-none top-6 right-6 group-hover:text-gray-400"
                                aria-hidden="true"
                            >
                                <svg
                                    class="w-6 h-6"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z"
                                    />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";
import JetApplicationLogo from "@/Jetstream/ApplicationLogo";

export default {
    metaInfo: { title: "Master - CRM Drago" },
    components: {
        AppLayout,
        Welcome,
        JetApplicationLogo
    }
};
</script>