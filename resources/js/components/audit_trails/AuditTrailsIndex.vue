<template>
    <div class="flex flex-col">
        <!-- <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 cursor-pointer">
                <router-link  :to="{ name: 'schools.create' }" class="text-sm font-medium">
                    Create New
                </router-link>
            </div>
        </div> -->
        <table class="min-w-full">
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
                        Who
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
                            {{ auditTrail.new_values.first_name }} {{ auditTrail.new_values.last_name }}
                        </td>
                        <td class="px-3 py-3 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <router-link :to="{name: 'audit_trails.edit', params: { id: auditTrail.id }, }">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </router-link>
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
        </table>
    </div>
</template>
<script>

import useAuditTrails from "../../composables/audit_trails"
import { onMounted } from "vue";

export default {
    setup() {
        const { auditTrails, getAuditTrails, destroyAuditTrail} = useAuditTrails();

        onMounted(getAuditTrails);

        console.log(auditTrails)
        
        const deleteAuditTrail = async (id) => {
            if (!window.confirm("Are you sure?")) {
                return;
            }
            await destroyAuditTrail(id);
            await getAuditTrails();
        };

        return {
            auditTrails,
            deleteAuditTrail,
        };
    },
};
</script>