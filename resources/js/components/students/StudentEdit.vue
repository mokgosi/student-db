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
            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
            <div class="mt-1">
                <input type="text" name="first_name" id="first_name"
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="student.first_name">
            </div>
            <div v-if="errors.name">
                <p v-for="error in errors.first_name" :key="error" class="text-sm text-red-500">
                    {{ error }}
                </p>
            </div>
        </div>
        <div>
            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
            <div class="mt-1">
                <input type="text" name="last_name" id="last_name"
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="student.last_name">
            </div>
            <div v-if="errors.last_name">
                <p v-for="error in errors.last_name" :key="error" class="text-sm text-red-500">
                    {{ error }}
                </p>
            </div>
        </div>
        <div>
            <label for="id_number" class="block text-sm font-medium text-gray-700">ID Number</label>
            <div class="mt-1">
                <input type="text" name="id_number" id="id_number"
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="student.id_number">
            </div>
            <div v-if="errors.id_number">
                <p v-for="error in errors.id_number" :key="error" class="text-sm text-red-500">
                    {{ error }}
                </p>
            </div>
        </div>
        <div>
            <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date Of Birth</label>
            <div class="mt-1">
                <input type="text" name="date_of_birth" id="date_of_birth"
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="student.date_of_birth">
            </div>
            <div v-if="errors.date_of_birth">
                <p v-for="error in errors.date_of_birth" :key="error" class="text-sm text-red-500">
                    {{ error }}
                </p>
            </div>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <div class="mt-1">
                <input type="text" name="email" id="email"
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="student.email">
            </div>
            <div v-if="errors.email">
                <p v-for="error in errors.email" :key="error" class="text-sm text-red-500">
                    {{ error }}
                </p>
            </div>
        </div>
        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <div class="mt-1">
                <input type="text" name="phone" id="phone"
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="student.phone">
            </div>
            <div v-if="errors.phone">
                <p v-for="error in errors.phone" :key="error" class="text-sm text-red-500">
                    {{ error }}
                </p>
            </div>
        </div>
        <div>
            <label for="home_address" class="block text-sm font-medium text-gray-700">Home Address</label>
            <div class="mt-1">
                <input type="text" name="home_address" id="home_address"
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    v-model="student.home_address">
            </div>
            <div v-if="errors.home_address">
                <p v-for="error in errors.home_address" :key="error" class="text-sm text-red-500">
                    {{ error }}
                </p>
            </div>
        </div>
        <div>
            <label for="school_id" class="block text-sm font-medium text-gray-700">School</label>
            <div class="mt-1">
                <select name="school_id" id="school_id" v-model="student.school_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">Select your school</option>
                    <option v-for="school in schools" :value="school.id" :key="school.id">
                        {{ school.name }}
                    </option>
                </select>
            </div>
            <div v-if="errors.school_id">
                <p v-for="error in errors.school_id" :key="error" class="text-sm text-red-500">
                    {{ error }}
                </p>
            </div>
        </div>
        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Update
        </button>
        <router-link  :to="{ name: 'students.index' }" class="inline-flex items-center font-semibold uppercase rounded-md text-xs px-4 py-2 ml-2 text-gray-900 first-letter:bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700   dark:hover:border-gray-600 dark:focus:ring-gray-700" >
            Cancel
        </router-link>
    </form>
</template>
<script>
import { onMounted, reactive } from 'vue'
import useStudents from '../../composables/students'

export default {
    props: {
        id: {
            required: true,
                type: String
        }
    },
    setup(props) {
        
        const { errors, student, schools, getStudent, getSchools, updateStudent} = useStudents();

        onMounted(getStudent(props.id))
        onMounted(getSchools)

        const saveStudent = async () => {
            await updateStudent(props.id);
        }

        return {
            student,
            errors,
            schools,
            saveStudent
        }
    }
}
</script>

