import { createRouter, createWebHistory  } from 'vue-router';

import SchoolsIndex from '../components/schools/SchoolsIndex';
import SchoolCreate from '../components/schools/SchoolCreate';
import SchoolEdit from '../components/schools/SchoolEdit';
import StudentsIndex from '../components/students/StudentsIndex';
import StudentCreate from '../components/students/StudentCreate';
import StudentEdit from '../components/students/StudentEdit';
import AuditTrailsIndex from '../components/audit_trails/AuditTrailsIndex';
import Dashboard from '../components/Dashboard';

const routes = [
    {
        path: '/dashboard',
        name: 'dashbord',
        component: Dashboard
    }, {
        path: '/schools',
        name: 'schools.index',
        component: SchoolsIndex
    }, {
        path: '/schools/create',
        name: 'schools.create',
        component: SchoolCreate,
    }, {
        path: '/schools/edit',
        name: 'schools.edit',
        component: SchoolEdit,
        props: true
    }, {
        path: '/students',
        name: 'students.index',
        component: StudentsIndex
    }, {
        path: '/students/create',
        name: 'students.create',
        component: StudentCreate,
    }, {
        path: '/students/edit',
        name: 'students.edit',
        component: StudentEdit,
        props: true
    }, {
        path: '/audit-trails',
        name: 'audit_trails.index',
        component: AuditTrailsIndex,
    }, {
        path: '/audit-trails/edit',
        name: 'audit_trails.edit',
        component: StudentEdit,
        props: true
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
});