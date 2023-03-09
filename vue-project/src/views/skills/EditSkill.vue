<template>
    <div>
        <h1>Update skill</h1>
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <!-- <form @submit.prevent="storeSkill(form)"> -->
                    <form @submit.prevent="updateSkill($route.params.id)">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" v-model="skill.name" class="form-control">
                            <div v-if="errors.name">
                                <span class="text-red font-weight-bold">{{ errors.name }}</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL</label>
                            <input type="text" v-model="skill.slug" class="form-control">
                            <div v-if="errors.slug">
                                <span class="text-red font-weight-bold">{{ errors.slug }}</span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </div>
</template>

<script setup>
import useSkills from '@/composables/skill';
import { onMounted } from 'vue';
import { defineProps } from 'vue';

const { skill, getSkill, updateSkill, errors } = useSkills();

const props = defineProps({
    id: {
        required: true,
        type: String
    }
});
onMounted(() => getSkill(props.id));


</script>

<style scoped></style>