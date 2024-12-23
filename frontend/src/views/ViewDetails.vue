<template>
    <div class="container mt-4">
        <h2 class="mb-4">Trainee Details</h2>

        <div v-if="trainee" class="card">
            <div class="card-body">
                <h5 class="card-title">{{ trainee.name }}'s Profile</h5>
                <p class="card-text"><strong>Skill:</strong> {{ trainee.skill }}</p>
                <p class="card-text"><strong>Biography:</strong> {{ trainee.bio }}</p>
                <p class="card-text"><strong>Training Center Information</strong></p>
                <p class="card-text"><strong>Training Center Name:</strong> {{ trainee.training_center.name }}</p>
                <p class="card-text"><strong>Training Center Description:</strong> {{ trainee.training_center.description }}</p>
                <button class="btn btn-danger" @click="deleteTrainee(trainee.id)">Delete Trainee</button>
                <button class="btn btn-secondary" @click="goBack">Go Back</button>
            </div>
        </div>

        <div v-else class="alert alert-info">Loading trainee details...</div>
    </div>
</template>

<script>
// import axios from 'axios';
import apiClient from '@/services/api'; 

export default {
    data() {
        return {
            trainee: null, 
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
        deleteTrainee(id) {
            if (confirm("Are you sure you want to delete this trainee?")) {
                apiClient.delete(`/trainees/${id}`)
                    .then(() => {
                        alert("Trainee deleted successfully.");
                        this.$router.push('/trainees'); // Redirect to the trainees list or another appropriate page
                    })
                    .catch((error) => {
                        console.error("Error deleting trainee:", error);
                        alert("Failed to delete trainee.");
                    });
            }
        },
        goBack() {
            this.$router.push('/AllTrainee'); 
        },
    },
};
</script>

<style>
</style>