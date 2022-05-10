<template>
    <div class="flex flex-col">
        <!-- <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 cursor-pointer">
                <router-link  :to="{ name: 'schools.create' }" class="text-sm font-medium">
                    Create New
                </router-link>
            </div>
        </div> -->
        <div>
            <vue-good-table
            :columns="columns"
            :rows="auditTrails"
            :line-numbers="true"
            :search-options="{
                enabled: true
            }"
            :sort-options="{
                enabled: true,
                initialSortBy: {field: 'update_date', type: 'asc'}
            }"
            :pagination-options="{
                enabled: true,
                mode: 'pages',
                perPage: 5,
                position: 'bottom',
                perPageDropdown: [5, 10, 15],
                dropdownAllowAll: false,
                setCurrentPage: 1,
                nextLabel: 'next',
                prevLabel: 'prev',
                rowsPerPageLabel: 'Rows per page',
                ofLabel: 'of',
                pageLabel: 'Page', // for 'pages' mode
                allLabel: 'All',
                // infoFn: (params) => `Showing ${params.firstRecordOnPage} to ${params.lastRecordOnPage} of page ${params.currentPage}`,

            }">
            <template #table-row="props">
                <span v-if="props.column.field == 'after'">
                    <a @click="deleteAuditTrail(props.row.id)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </a>
                </span>
                <span v-else>
                    {{props.formattedRow[props.column.field]}}
                </span>
            </template>

            </vue-good-table>

        </div>
        <!-- <table class="min-w-full">
            <thead>
                <tr>
                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                        Auditable Type
                    </th>
                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                        Change By
                    </th>
                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                        Event
                    </th>
                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                        Student
                    </th>
                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                        Delete
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <template v-for="auditTrail in auditTrails" :key="auditTrail.id"> 
                    <tr>
                         <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                            {{ auditTrail.auditable_type }}
                        </td>
                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                            {{ auditTrail.user.name }}
                        </td>
                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                            {{ auditTrail.event }}
                        </td>
                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                            <span v-if="auditTrail.new_values.first_name">
                            {{ auditTrail.new_values.first_name }} {{ auditTrail.new_values.last_name }}
                            </span>
                            <span v-else>
                                Id: {{ auditTrail.auditable_id }} 
                            </span>
                        </td>
                        <td class="px-3 py-3 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <a @click="deleteAuditTrail(auditTrail.id)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table> -->
    </div>
</template>
<script>

import useAuditTrails from "../../composables/audit_trails"
import { onMounted, reactive } from "vue";

import 'vue-good-table-next/dist/vue-good-table-next.css'
import { VueGoodTable } from 'vue-good-table-next';

export default {
    components: { VueGoodTable },
    setup() {
        const { auditTrails, getAuditTrails, destroyAuditTrail} = useAuditTrails();

        const tdHClass = "x-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100"
        const tdCClass = "px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200"

        const columns = reactive([
            {label: "Auditable Type", field: 'auditable_type', tdClass: tdCClass, thClass: tdHClass},
            {label: "Event", field: 'event', tdClass: tdCClass, thClass: tdHClass},
            {label: "ChangedBy", field: 'user', tdClass: tdCClass, thClass: tdHClass},
            {label: "Old Values", field: 'old_values', sortable: false, tdClass: tdCClass, thClass: tdHClass},
            {label: "New Values", field: 'new_values', sortable: false, tdClass: tdCClass, thClass: tdHClass},
            {label: "Date", field: 'update_date', tdClass: tdCClass, thClass: tdHClass},
            {label: 'Delete', field: 'after', sortable: false, tdClass: tdCClass, thClass: tdHClass}
        ]);

        onMounted(getAuditTrails);

        const deleteAuditTrail = async (id) => {
            if (!window.confirm("Are you sure?")) {
                return;
            }
            await destroyAuditTrail(id);
            await getAuditTrails();
        };

        return {
            columns,
            auditTrails,
            deleteAuditTrail,
        };
    },
};
</script>