<template>
    <!-- <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div> -->
    <form class="space-y-6" @submit.prevent="saveStudent">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <div class="mt-1">
                <input type="text" name="name" id="name"
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="form.name">
            </div>
            <div v-if="errors.name">
                <p v-for="error in errors.name" :key="error" class="text-sm">
                    {{ error }}
                </p>
            </div>
        </div>
        <div>
            <label for="area" class="block text-sm font-medium text-gray-700">Area</label>
            <div class="mt-1">
                <input type="text" name="area" id="area"
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="form.area">
            </div>
            <div v-if="errors.area">
                <p v-for="error in errors.area" :key="error" class="text-sm">
                    {{ error }}
                </p>
            </div>
        </div>
        <div>
            <label for="province_id" class="block text-sm font-medium text-gray-700">Province</label>
            <div class="mt-1">
                <input type="text" name="province_id" id="province_id"
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="form.province_id">
            </div>
            <div v-if="errors.province_id">
                <p v-for="error in errors.province_id" :key="error" class="text-sm">
                    {{ error }}
                </p>
            </div>
        </div>
        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Create
        </button>
    </form>
</template> 
<script>

import useStudents from "../../composables/students"
import { onMounted, reactive } from "vue";

export default {
    setup() {
        const { errors, storeStudent} = useStudents();

        const form = reactive({
            'name': '',
            'area': '',
            'province_id': ''
        })

        const saveStudent = async () => {
            await storeStudent({...form});
        }
        
        return {
            form,
            errors,
            saveStudent,
        };
    }
};
</script>       