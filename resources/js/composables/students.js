import axios from "axios";
import { ref } from "vue";
import { useRouter } from 'vue-router';

export default function useStudents() {

    const student = ref([])
    const students = ref([])
    const schools = ref([])
    const errors = ref('')
    const router = useRouter()

    const getStudents = async () => {
        let response = await axios.get('/api/students')
        students.value = response.data.data;
    }

    const getStudent = async (id) => {
        let response = await axios.get(`/api/students/${id}`)
        student.value = response.data.data;
    }

    const storeStudent = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/students', data)
            await router.push({ name: 'students.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const getSchools = async () => {
        let response = await axios.get('/api/schools')
        schools.value = response.data.data;
    }

    const updateStudent = async (id) => {
        errors.value = ''
        try {
            await axios.put(`/api/students/${id}`, student.value);
            await router.push({ name: 'students.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const destroyStudent = async (id) => {
        await axios.delete(`/api/students/${id}`);
    }

    return {
        errors,
        student,
        students,
        schools,
        getStudent,
        getStudents,
        storeStudent,
        destroyStudent,
        updateStudent,
        getSchools
    }
}