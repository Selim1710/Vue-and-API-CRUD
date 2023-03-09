import { ref } from "vue";
import axios from 'axios';
// import { useRouter } from 'vue-router';

axios.defaults.baseURL = 'http://127.0.0.1:8000/api/v1/';

export default function useSkills() {
    const skills = ref([]);
    const skill = ref([]);
    const errors = ref({});
    // const router = useRouter();

    // multiple skill
    const getSkills = async () => {
        const response = await axios.get('skills/');
        // console.log(response);
        // the last data coming from laravel api
        skills.value = response.data.data;
    };

    // here we will get single skill; to get a single skill we need id
    const getSkill = async (id) => {
        const response = await axios.get('skills/' + id);
        skill.value = response.data.data;
    };

    // store skill
    const storeSkill = async (data) => {
        try {
            await axios.post('skills', data);
            // await router.push({ name: 'indexSkill' });

        } catch (error) {
            alert('error in skill.js >> store');
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    // update skill
    const updateSkill = async (id) => {
        try {
            await axios.put('skills/' + id, skill.value);
            // await router.push({ name: 'indexSkill' });

        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
                console.log('update error');
            }
        }
    }

    // delete skill
    const deleteSkill = async (id) => {
        if (!window.confirm('are you sure?')) {
            return;
        }
        await axios.delete('skills/' + id);
        await getSkill();

    }

    return {
        skill,
        skills,
        getSkill,
        getSkills,
        storeSkill,
        updateSkill,
        deleteSkill,
        errors,

    };

}