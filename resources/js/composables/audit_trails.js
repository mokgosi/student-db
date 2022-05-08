import axios from "axios";
import { ref } from "vue";
import { useRouter } from 'vue-router';

export default function useAuditTrails() {

    const auditTrails = ref([])

    const router = useRouter()

    const getAuditTrails = async () => {
        let response = await axios.get('/api/audit-trails')
        auditTrails.value = response.data.data;
    }

    const destroyAuditTrails = async (id) => {
        await axios.delete(`/api/audit-trails/${id}`);
    }

    return {
        auditTrails,
        getAuditTrails,
        destroyAuditTrails
    }
}