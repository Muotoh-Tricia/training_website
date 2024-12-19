<template>
    <div>
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <div class="container">
                    <router-link to="/" class="navbar-brand text-white">
                        TrainingWeb</router-link>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <router-link to="/" class="nav-link text-white">Home</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/CreateTrainee" class="nav-link text-white">Create</router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/AllTrainee" class="nav-link text-white">All_Trainee</router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped></style>