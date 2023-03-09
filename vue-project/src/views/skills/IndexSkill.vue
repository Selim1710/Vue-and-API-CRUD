<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-end mb-3">
                    <!-- <a href="#" class="btn btn-primary">add skill</a> -->
                    <RouterLink :to="{ name: 'createSkill' }" class="btn btn-primary">New skill</RouterLink>
                </div>
                <div class="col-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="skill in skills" :key="skill.id">
                                <td>{{ skill.id }}</td>
                                <td>{{ skill.name }}</td>
                                <td>{{ skill.slug }}</td>
                                <td>
                                    <div class="">
                                        <RouterLink :to="{ name: 'editSkill', params:{ id: skill.id } }"
                                            class="btn btn-primary">
                                            Edit
                                        </RouterLink> &nbsp;
                                        <button class="btn btn-danger" @click="deleteSkill(skill.id)">
                                            delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import useSkills from '@/composables/skill';
import { onMounted } from 'vue';

const { skills, getSkills, deleteSkill } = useSkills();
onMounted(() => getSkills());
</script>

<style scoped></style>