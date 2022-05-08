import axios from "axios";
import { ref } from "vue";
import { useRouter } from 'vue-router';

export default function useSchools() {

    const school = ref([])
    const schools = ref([])
    const provinces = ref([])
    const errors = ref('')
    const router = useRouter()

    const getSchools = async () => {
        let response = await axios.get('/api/schools')
        schools.value = response.data.data;
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

    const getProvinces = async () => {
        let response = await axios.get('/api/provinces')
        provinces.value = response.data.data;
    }

    const updateSchool = async (id) => {
        errors.value = ''
        try {
            await axios.put(`/api/schools/${id}`, school.value);
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
        provinces,
        getSchool,
        getSchools,
        storeSchool,
        destroySchool,
        updateSchool,
        getProvinces
    }
}