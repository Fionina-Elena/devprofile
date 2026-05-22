<template>
    <div v-if="isOpen" class="modal" @click="closeOutside">
        <div class="modal__content" @click.stop>
            <button class="modal__close" @click="close">×</button>
            <h2>Форма связи</h2>
            <p>TODO: Сделаем позже</p>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const isOpen = ref(false);

const open = () => isOpen.value = true;
const close = () => isOpen.value = false;
const closeOutside = () => isOpen.value = false;

defineExpose({ open, close });
</script>

<style scoped>
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal__content {
    background: white;
    padding: 2rem;
    border-radius: 1rem;
    max-width: 500px;
    width: 90%;
    position: relative;
}

.modal__close {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: none;
    font-size: 1.5rem;
    color: #6b7280;
    padding: 0.5rem;
    line-height: 1;
}

.modal__close:hover {
    color: #1f2937;
}
</style>