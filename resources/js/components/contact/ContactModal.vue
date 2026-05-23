<template>
    <div v-if="isOpen" class="modal" @click="closeOutside">
        <div class="modal__content" @click.stop>
            <button class="modal__close" @click="close">×</button>
            <h2>Отправить сообщение</h2>

            <form @submit.prevent="handleSubmit" class="contact-form">
                <div class="form-group">
                    <label>Имя *</label>
                    <input v-model="form.name" type="text" required>
                    <span class="error">{{ errors && errors.name ? errors.name[0] : '' }}</span>
                </div>

                <div class="form-group">
                    <label>Телефон</label>
                    <input v-model="form.phone" v-mask="'+7 (###) ###-##-##'" type="tel"
                        placeholder="+7 (___) ___-__-__">
                </div>

                <div class="form-group">
                    <label>Email *</label>
                    <input v-model="form.email" type="email" required>
                    <span class="error">{{ errors && errors.email ? errors.email[0] : '' }}</span>
                </div>

                <div class="form-group">
                    <label>Комментарий *</label>
                    <textarea v-model="form.message" required rows="4"></textarea>
                    <span class="error">{{ errors && errors.message ? errors.message[0] : '' }}</span>
                </div>

                <div v-if="successMessage" class="success">
                    {{ successMessage }}
                </div>

                <div v-if="errorMessage" class="error-global">
                    {{ errorMessage }}
                </div>

                <button type="submit" class="submit-button">Отправить</button>
            </form>
        </div>
    </div>
</template>

<script>
import { mask } from 'vue-the-mask';
import axios from 'axios';

export default {
    directives: {
        mask
    },

    data() {
        return {
            isOpen: false,
            successMessage: '',
            errorMessage: '',
            form: {
                name: '',
                phone: '',
                email: '',
                message: ''
            },
            errors: null
        };
    },

    methods: {
        open() {
            this.isOpen = true;
            this.resetForm();
        },

        close() {
            this.isOpen = false;
            this.resetForm();
        },

        closeOutside() {
            this.isOpen = false;
            this.resetForm();
        },

        resetForm() {
            this.form.name = '';
            this.form.phone = '';
            this.form.email = '';
            this.form.message = '';
            this.errors = null;
            this.successMessage = '';
            this.errorMessage = '';
        },

        handleSubmit() {
            let vue = this;
            vue.errors = null;
            vue.errorMessage = '';
            vue.successMessage = '';
            axios.post('/api/contact', vue.form)
                .then(function (response) {
                    vue.successMessage = 'Спасибо! Я свяжусь с вами в ближайшее время.';
                    vue.form = {
                        name: '',
                        phone: '',
                        email: '',
                        message: ''
                    };
                    vue.errors = null;
                    vue.close();
                })
                .catch(function (error) {
                    if (error.response && error.response.data.errors) {
                        vue.errors = error.response.data.errors;
                    } else {
                        vue.errorMessage = 'Ошибка отправки';
                    }
                });
        }
    }
};
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
    border: none;
    cursor: pointer;
}

.modal__close:hover {
    color: #1f2937;
}

.modal__content h2 {
    color: var(--primary-color);
    margin-bottom: 1.5rem;
}

.contact-form {
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.form-group label {
    font-weight: 600;
    color: #374151;
}

.form-group input,
.form-group textarea {
    padding: 0.75rem;
    border: 1px solid #d1d5db;
    border-radius: 0.5rem;
    font-size: 1rem;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--primary-color);
}

.form-group textarea {
    resize: vertical;
    min-height: 100px;
}

.error {
    color: #ef4444;
    font-size: 0.875rem;
}

.error-global {
    background-color: #fee2e2;
    color: #991b1b;
    padding: 0.75rem;
    border-radius: 0.5rem;
    text-align: center;
}

.success {
    background-color: #d1fae5;
    color: #065f46;
    padding: 0.75rem;
    border-radius: 0.5rem;
    text-align: center;
}

.submit-button {
    padding: 0.75rem 1.5rem;
    background: var(--primary-color);
    color: white;
    border: none;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s;
}

.submit-button:hover {
    background: #887467;
}
</style>