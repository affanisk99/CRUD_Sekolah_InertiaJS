<template>
	<app-layout>
	<div class="min-h-screen bg-gray-50">
		<div class="py-10">
			<main>
				<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
					<div class="bg-white overflow-hidden shadow rounded-lg">
						<div class="px-4 py-5 sm:p-6">
							<form class="space-y-8 p-2 divide-y divide-gray-200" @submit.prevent="submit">
								<div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
									<div class=" space-y-6 sm:space-y-5">
										<div>
											<h3 class="text-lg leading-6 font-medium text-gray-900">
												<span v-text="pageTitle"></span>
											</h3>
											<p class="mt-1 max-w-2xl text-sm text-gray-500">
											</p>
										</div>
										<div class="space-y-6 sm:space-y-5">
											<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
												<label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
													Name
												</label>
												<div class="mt-1 sm:mt-0 sm:col-span-2">
													<input type="text" name="name" id="name" v-model="form.name"  autocomplete="given-name" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
												</div>
											</div>

											<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
												<label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
													Date of Birth
												</label>
												<div class="mt-1 sm:mt-0 sm:col-span-2">
													<input type="date" name="dob" id="username" v-model="form.dob"  autocomplete="family-name" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
												</div>
											</div>

											<div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
												<label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
													
													<button v-if="!teacher.deleted_at" class="float-left text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete teacher</button>
												</label>
												<div class="mt-1 sm:mt-0 sm:col-span-2">
												</div>
											</div>
										</div>
									</div>

								</div>

								<div class="pt-5">
									<div class="flex justify-end">
										<inertia-link :href="route('teacher.index')" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
											Cancel
										</inertia-link>
										<loading-button :loading="sending" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">Update</loading-button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
	</app-layout>
</template>

<script>
import Icon from '@/Shared/Icon'
import AppLayout from '@/Layouts/AppLayout'
import LoadingButton from '@/Shared/LoadingButton'

export default {
    components: {
        Icon,
        AppLayout,
        LoadingButton,
    },
    props: {
      pageTitle: String,
      errors: Object,
      teacher: Object
    },
    remember: 'form',
	data() {
		return {
		  sending: false,
		  form: {
			id: this.teacher.id,
		    name: this.teacher.name,
		    dob: this.teacher.dob,
		  },
		}
	},
	methods: {
		submit() {
		  this.$inertia.put(this.route('teacher.update', this.teacher.id), this.form, {
		    onStart: () => this.sending = true,
		    onFinish: () => this.sending = false,
		  })
		},
		destroy() {
	      if (confirm('Are you sure you want to delete this teacher?')) {
	        this.$inertia.delete(this.route('teacher.destroy', this.teacher.id))
	      }
	    },
	},
}
</script>
