<template>
    <div class="container mt-4">
        <h2>Edit Trainee</h2>
        <form @submit.prevent="updateTrainee">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" v-model="trainee.name" required />
            </div>
            <div class="mb-3">
                <label for="skill" class="form-label">Skill</label>
                <input type="text" class="form-control" id="skill" v-model="trainee.skill" required />
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">Biography</label>
                <textarea class="form-control" id="bio" v-model="trainee.bio" required></textarea>
            </div>
            <div class="mb-3">
                <label for="trainingCenterName" class="form-label">Training Center Name</label>
                <input type="text" class="form-control" id="trainingCenterName" v-model="trainee.training_center.name" required />
            </div>
            <button type="submit" class="btn btn-primary">Update Trainee</button>
            <button class="btn btn-secondary" @click="goBack">Go Back</button>
        </form>
    </div>
</template>

<script>
import apiClient from '@/services/api'; 

export default {
    data() {
        return {
            trainee: {
                name: '',
                skill: '',
                bio: '',
                training_center: {
                    name: ''
                }
            }
        };
    },
    created() {
        const traineeId = this.$route.params.id; 
        this.getTraineeById(traineeId);
    },
    methods: {
        getTraineeById(id) {
            apiClient.getTraineeById(id)
                .then((response) => {
                    this.trainee = response.data.data;
                })
                .catch((error) => {
                    console.error("Error fetching trainee details:", error);
                    alert("Failed to load trainee details.");
                });
        },
        updateTrainee() {
            const traineeId = this.$route.params.id; 
            apiClient.updateTrainee(traineeId, this.trainee)
                .then(() => {
                    alert("Trainee updated successfully.");
                    this.$router.push('/AllTrainee'); 
                })
                .catch((error) => {
                    console.error("Error updating trainee:", error);
                    alert("Failed to update trainee.");
                });
        },
        goBack() {
            this.$router.push('/AllTrainee'); 
        },
    },
};
</script>

<style>
</style>