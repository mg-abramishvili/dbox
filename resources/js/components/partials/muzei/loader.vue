<template>
    <div class="lds-dual-ring"></div>
</template>

<style scoped>
    .lds-dual-ring {
    display: block;
    width: 20vh;
    height: 20vh;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 0;
    right: 0;
    margin: 0 auto;
    }
    .lds-dual-ring:after {
    content: " ";
    display: block;
    width: 14vh;
    height: 14vh;
    margin: 2vh;
    border-radius: 50%;
    border: 1vh solid #976545;
    border-color: #976545 transparent #976545 transparent;
    animation: lds-dual-ring 1.2s linear infinite;
    }
    @keyframes lds-dual-ring {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
    }
</style>