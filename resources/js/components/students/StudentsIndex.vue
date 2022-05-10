<template>
    <div class="flex flex-col">
        <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 cursor-pointer">
                <router-link  :to="{ name: 'students.create' }" class="text-sm font-medium">
                    Create New
                </router-link>
            </div>
        </div>
        <div>
            <vue-good-table
            :columns="columns"
            :rows="students"
            :line-numbers="true"
            :search-options="{
                enabled: true
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
                pageLabel: 'page', // for 'pages' mode
                allLabel: 'All',
                infoFn: (params) => `my own page ${params.firstRecordOnPage}`, 
            }">
            <template #table-row="props">
                <span v-if="props.column.field == 'before'">
                    <router-link :to="{name: 'students.edit', params: { id: props.row.id }, }">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </router-link>
                </span>
                <span v-else-if="props.column.field == 'after'">
                    <a @click="deleteStudent(props.row.id)">
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
                        First Name
                    </th>
                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                        Last Name
                    </th>
                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                        ID Number
                    </th>
                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                        Email
                    </th>
                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                        Phone
                    </th>
                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                        School
                    </th>
                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                        Edit
                    </th>
                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                        Delete
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <template v-for="student in students" :key="student.id"> 
                    <tr>
                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                            {{ student.first_name }}
                        </td>
                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                            {{ student.last_name }}
                        </td>
                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200" >
                            {{ student.id_number }}
                        </td>
                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200" >
                            {{ student.email }}
                        </td>
                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200" >
                            {{ student.phone }}
                        </td>
                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200" >
                            {{ student.school.name }}
                        </td>
                        <td class="px-3 py-3 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <router-link :to="{name: 'students.edit', params: { id: student.id }, }">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </router-link>
                        </td>
                        <td class="px-3 py-3 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <a @click="deleteStudent(student.id)">
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

import useStudents from "../../composables/students"
import { onMounted, reactive } from "vue";

import 'vue-good-table-next/dist/vue-good-table-next.css'
import { VueGoodTable } from 'vue-good-table-next';

export default {
    components: { VueGoodTable },
    setup() {
        const { students, getStudents, destroyStudent} = useStudents();

        const columns = reactive([
            {label: "First Name", field: 'first_name'},
            {label: "Last Name", field: 'last_name'},
            {label: "ID Number", field: 'id_number'},
            {label: "Email", field: 'email'},
            {label: 'Phone', field: 'phone'},
            {label: 'School', field: 'school'},
            {label: 'Edit', field: 'before'},
            {label: 'Delete', field: 'after'}
        ]);

        onMounted(getStudents);
        
        const deleteStudent = async (id) => {
            if (!window.confirm("Are you sure?")) {
                return;
            }
            await destroyStudent(id);
            await getStudents();
        };

        return {
            columns,
            students,
            deleteStudent,
        };
    },
};
</script>