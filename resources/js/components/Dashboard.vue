<template>
    <div class="flex">
        <div class="w-1/2">
            <div class="p-2">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white px-6 border-b border-gray-200">
                        <h2 class="py-4 font-bold">Welcome</h2>
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                                        Student Name
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                                        School
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="student in students" :key="student.id"> 
                                    <tr>
                                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                                            {{ student.first_name }} {{ student.last_name }}
                                        </td>
                                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                                            {{ student.school.name }}
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div class="flex place-content-end pt-3 text-indigo-700 cursor-pointer">
                            <router-link  :to="{ name: 'students.index' }" class="text-sm font-medium">
                                See more...
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white px-6 border-b border-gray-200">
                        <h2 class="py-4 font-bold">Schools</h2>
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                                        School
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                                        No. of Students
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="school in schools" :key="school.id"> 
                                    <tr>
                                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                                            {{ school.name }}
                                        </td>
                                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                                            {{ school.students_count }}
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div class="flex place-content-end pt-3 text-indigo-700 cursor-pointer">
                            <router-link  :to="{ name: 'schools.index' }" class="text-sm font-medium">
                                See more...
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/2">
            <div class="p-2">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white px-6 border-b border-gray-200">
                        <h2 class="py-4 font-bold">Audit Trail</h2>
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                                        Auditable Type
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                                        Event
                                    </th>
                                    <th class="px-3 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-100">
                                        Student
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="auditTrail in auditTrails" :key="auditTrail.id"> 
                                    <tr>
                                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                                            {{ auditTrail.auditable_type }}
                                        </td>
                                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                                            {{ auditTrail.event}}
                                        </td>
                                        <td class="px-3 py-3 text-sm font-medium whitespace-no-wrap border-b border-gray-200">
                                            {{ auditTrail.new_values.first_name }} {{ auditTrail.new_values.last_name }}
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div class="flex place-content-end pt-3 text-indigo-700 cursor-pointer">
                            <router-link  :to="{ name: 'audit_trails.index' }" class="text-sm font-medium">
                                See more...
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import useDashboards from "../composables/dashboards"
import { onMounted, reactive } from "vue";

export default {
    setup() {
        const { schools, students, auditTrails, getSchools, getStudents, getAuditTrails } = useDashboards();

        onMounted(getSchools)
        onMounted(getStudents)
        onMounted(getAuditTrails)

        // console.log(students)

        return {
            schools,
            students,
            auditTrails,
        };
    }
};
</script>       
