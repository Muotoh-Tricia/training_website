<template>
    <div class="container mt-4">
        <h2 class="mb-4">Trainee Details</h2>

        <div v-if="trainee" class="card">
            <div class="card-body">
                <h5 class="card-title">{{ trainee.name }}</h5>
                <p class="card-text"><strong>Skill:</strong> {{ trainee.skill }}</p>
                <p class="card-text"><strong>Biography:</strong> {{ trainee.bio }}</p>
                <p class="card-text"><strong>Training Center:</strong> {{ trainee.training_center_name }}</p>
            </div>
        </div>

        <div v-else class="alert alert-info">Loading trainee details...</div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            trainee: null, // Holds the trainee details
        };
    },
    created() {
        const traineeId = this.$route.params.id; // Assumes a route parameter named 'id'
        this.getTraineeById(traineeId);
    },
    methods: {
        getTraineeById(id) {
            // Fetch trainee details by ID
            axios
                .get(`/api/trainees/${id}`)
                .then((response) => {
                    this.trainee = response.data;
                })
                .catch((error) => {
                    console.error("Error fetching trainee details:", error);
                    alert("Failed to load trainee details.");
                });
        },
    },
};
</script>

<style>
/* Add your custom styles here */
</style>
