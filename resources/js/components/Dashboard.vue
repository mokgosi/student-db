<template>
    <div class="flex">
        <div class="w-1/2">
            <div class="p-6">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white p-6 border-b border-gray-200">
                        <h2>Students</h2>
                        <template v-for="student in students" :key="student.id"> 
                            <p>{{ student.first_name }} {{ student.last_name }}</p>
                        </template>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white p-6 border-b border-gray-200">
                        <h2>Schools</h2>
                        <template v-for="school in schools" :key="school.id"> 
                            <p>{{ school.name }}</p>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/2">
            <div class="p-6">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white p-6 border-b border-gray-200">
                        <h2>Audit Trail</h2>
                        <template v-for="auditTrail in auditTrails" :key="auditTrail.id"> 
                            <p>{{ auditTrail.message }}</p>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex">
        <div class="w-1/2">
            <div class="p-6">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white p-6 border-b border-gray-200">
                        <h2>Schools</h2>
                        <template v-for="student in students" :key="student.id"> 
                            <p>{{ student.first_name }} {{ student.last_name }}</p>
                        </template>
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

        return {
            schools,
            students,
            auditTrails,
        };
    }
};
</script>       
