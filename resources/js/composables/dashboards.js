import axios from "axios";
import { ref } from "vue";
import { useRouter } from 'vue-router';

export default function useDashboards() {

    const schools = ref([])
    const students = ref([])
    const auditTrails = ref([])

    const router = useRouter()

    const getSchools = async () => {
        let response = await axios.get('/api/schools')
        schools.value = response.data.data;
    }
 
    const getStudents = async () => {
        let response = await axios.get('/api/students')
        students.value = response.data.data;
    }

    const getAuditTrails = async () => {
        let response = await axios.get('/api/audit-trails')
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