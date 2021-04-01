<template>
    <div class="lds-dual-ring"></div>
</template>

<style scoped>
    .lds-dual-ring {
    display: block;
    width: 30vh;
    height: 30vh;
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
    width: 28vh;
    height: 28vh;
    margin: 2vh;
    border-radius: 50%;
    border: 2vh solid #cef;
    border-color: #cef transparent #cef transparent;
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