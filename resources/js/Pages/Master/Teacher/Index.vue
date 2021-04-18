<template>
    <app-layout>
        <div class="py-6">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            	<div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
					<div>
						<h1 class="text-2xl font-bold text-gray-900"> {{ pagetitle }}</h1>
						<p class="text-xs text-gray-500 font-small" > Terakhir diperbaharui {{ getHumanDate(last_updated.created_at) }} oleh admin</p>
					</div>
					<div class="flex mt-3 sm:mt-0 sm:ml-4">
						<search-filter v-model="form.search" class="mr-4 " @reset="reset">
							<label class="block text-gray-700">Column:</label>
						</search-filter>
						<inertia-link :href="route('teacher.create')" class="inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
							Create
						</inertia-link>
					</div>
              	</div>

                <!-- Table column -->
                <div class="flex flex-col">
                    <div class="mt-2 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                          
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr >
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50" >
                                  Name
                                </th>
                                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50" >
                                  Date of Birth
                                </th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                              <tr v-for="teacher in teachers.data" :key="teacher.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                 <td class="text-sm font-medium text-gray-700 whitespace-nowrap">
                                  <inertia-link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="route('teacher.edit', teacher.id)">
                                    {{ teacher.name }}
                                  </inertia-link>
                                </td>
                                <td class="text-sm font-medium text-gray-700 whitespace-nowrap">
                                  <inertia-link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="route('teacher.edit', teacher.id)">
                                    {{ teacher.dob }}
                                  </inertia-link>
                                </td>
                                 <td class="text-sm font-medium text-gray-700 whitespace-nowrap">
                                  <inertia-link class="flex items-center px-4" :href="route('teacher.edit', teacher.id)" tabindex="-1">
                                    <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
                                  </inertia-link>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                         
                        </div>
                      </div>
                      
                    </div>
                     <!-- Pagination -->
                          <!-- // End pagination -->
                  </div>
                <!-- // End Table column -->
            </div>
          </div>
    </app-layout>
</template>

<script>
import Icon from '@/Shared/Icon'
import AppLayout from '@/Layouts/AppLayout'
import SearchFilter from '@/Shared/SearchFilter'
import mapValues from 'lodash/mapValues'
import pickBy from 'lodash/pickBy'
import throttle from 'lodash/throttle'
import moment from 'moment';

export default {
    components: {
        Icon,
        AppLayout,
        SearchFilter
    },
	data() {
      return {
        form: {
			search: this.filters.search,
			role: this.filters.role,
			trashed: this.filters.trashed,
        },
      }
    },
	watch: {
      form: {
        handler: throttle(function() {
          let query = pickBy(this.form)
          this.$inertia.replace(this.route('teacher.index', Object.keys(query).length ? query : { remember: 'forget' }))
        }, 20),
        deep: true,
      }
	},
    props: {
		teachers: Object,
		filters: Object,
		pagetitle: String,
    	last_updated: Object
    },
	methods: {
		reset() {
            this.form = mapValues(this.form, () => null)
        },
		getHumanDate : function (date) {
        	return moment(date).startOf('second').fromNow();
        },
	}
}
</script>
