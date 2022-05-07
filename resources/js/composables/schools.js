import axios from "axios";
import { ref } from "vue";
import { useRouter } from 'vue-router';

export default function useSchools() {

    const school = ref([])
    const schools = ref([])
    const errors = ref('')
    const router = useRouter()

    const getSchools = async () => {
        let response = await axios.get('/api/school')
        schools.value = response.data;
    }

    const getSchool = async (id) => {
        let response = await axios.get(`/api/schools/${id}`)
        school.value = response.data.data;
    }

    const storeSchool = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/schools', data)
            await router.push({ name: 'schools.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const updateSchool = async (id) => {
        errors.value = ''
        try {
            await axios.put(`/api/schools/${id}`, student.value);
            await router.push({ name: 'schools.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const destroySchool = async (id) => {
        await axios.delete(`/api/schools/${id}`);
    }

    return {
        errors,
        school,
        schools,
        getSchool,
        getSchools,
        storeSchool,
        destroySchool,
        updateSchool
    }
}