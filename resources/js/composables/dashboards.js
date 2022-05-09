import axios from "axios";
import { ref } from "vue";
import { useRouter } from 'vue-router';

export default function useDashboards() {

    const schools = ref([])
    const students = ref([])
    const auditTrails = ref([])

    const router = useRouter()

    const getSchools = async () => {
        let response = await axios.get('/api/schools-dashboard')
        schools.value = response.data.data;
    }
 
    const getStudents = async () => {
        let response = await axios.get('/api/students-dashboard')
        students.value = response.data.data;
    }
    console.log(students)

    const getAuditTrails = async () => {
        let response = await axios.get('/api/audit-trails-dashboard')
        auditTrails.value = response.data.data;
    }

    return {
        schools,
        students,
        auditTrails,
        getSchools,
        getStudents,
        getAuditTrails,
    }
}