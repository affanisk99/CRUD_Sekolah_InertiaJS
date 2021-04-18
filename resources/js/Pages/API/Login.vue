<template>
    <div
        class="flex items-center justify-center min-h-screen px-4 py-12 bg-gray-50 dark:bg-gray-900 sm:px-6 lg:px-8"
    >
        <div class="w-full max-w-md space-y-8">
            <div>
                <img
                    class="w-auto h-12 mx-auto"
                    src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                    alt="Workflow"
                />
                <h2
                    class="mt-6 text-3xl font-extrabold text-center text-gray-900 dark:text-gray-300"
                >
                    Masuk Denka Karir
                </h2>
                <p class="mt-2 text-sm text-center text-gray-600">
                    <a
                        href="#"
                        class="font-medium text-indigo-600 hover:text-indigo-500"
                    >
                        Sistem Informasi Denka Karir
                    </a>
                </p>
            </div>
            <jet-validation-errors class="mb-4" />

            <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
                {{ status }}
            </div>
            <form class="mt-8 space-y-6" @submit.prevent="submit">
                <input type="hidden" name="remember" value="true" />
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="email-address" class="sr-only"
                            >Alamat Email</label
                        >
                        <input
                            v-model="form.email"
                            id="email-address"
                            name="email"
                            type="email"
                            autocomplete="email"
                            required
                            class="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Alamat Email"
                        />
                    </div>
                    <div>
                        <label for="password" class="sr-only">Kata kunci</label>
                        <input
                            v-model="form.password"
                            id="password"
                            name="password"
                            type="password"
                            autocomplete="current-password"
                            required
                            class="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="Kata Kunci"
                        />
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input
                            v-model="form.password"
                            id="remember_me"
                            name="remember_me"
                            type="checkbox"
                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
                        />
                        <label
                            for="remember_me"
                            class="block ml-2 text-sm text-gray-900 dark:text-gray-300"
                        >
                            Ingatkan saya
                        </label>
                    </div>
                </div>

                <div>
                    <button
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md group hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        <span
                            class="absolute inset-y-0 left-0 flex items-center pl-3"
                        >
                            <!-- Heroicon name: solid/lock-closed -->
                            <svg
                                class="w-5 h-5 text-indigo-500 group-hover:text-indigo-400"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </span>
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import JetValidationErrors from "@/Jetstream/ValidationErrors";
import LoadingButton from "@/Shared/LoadingButton";

export default {
    metaInfo: { title: "Login - CRM Drago" },
    components: {
        LoadingButton,
        JetValidationErrors
    },

    props: {
        canResetPassword: Boolean,
        status: String
    },

    data() {
        return {
            sending: false,
            form: this.$inertia.form({
                email: "",
                password: "",
                remember: false
            })
        };
    },

    methods: {
        submit() {
            this.form
                .transform(data => ({
                    ...data,
                    remember: this.form.remember ? "on" : ""
                }))
                .post(this.route("login"), {
                    onStart: () => (this.sending = true),
                    onFinish: () => (this.sending = false)
                });
        }
    }
};
</script>
