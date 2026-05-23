<template>
    <section class="cases">
        <div class="cases-grid">
            <div v-for="oneCase in allCases" :key="oneCase.id" class="case-card">
                <div class="case-card__carousel">
                    <img :src="oneCase.images[oneCase.currentImageIndex]" :alt="oneCase.title" class="carousel__image">
                    <button class="carousel__prev" @click="previousImage(oneCase.id)">
                        ←
                    </button>

                    <button class="carousel__next" @click="nextImage(oneCase.id)">
                        →
                    </button>

                    <div class="carousel__dots">
                        <span v-for="(image, index) in oneCase.images" :key="index"
                            :class="{ active: oneCase.currentImageIndex === index }"
                            @click="goToImage(oneCase.id, index)"></span>
                    </div>
                </div>

                <h3 class="case-card__title">
                    {{ oneCase.title }}
                    <a v-if="oneCase.demoLink" :href="oneCase.demoLink" class="case-card__demo-link" target="_blank">
                        Посмотреть проект <i class="fa-solid fa-reply fa-sm" style="color: rgb(72, 24, 24);"></i>
                    </a>
                </h3>

                <p class="case-card__description">{{ oneCase.description }}</p>

                <div class="case-card__role">
                    <strong>Что делала:</strong>
                    <ul>
                        <li v-for="task in oneCase.whatIDid">{{ task }}</li>
                    </ul>
                </div>

                <div class="case-card__stack">
                    <span v-for="tech in oneCase.technologies">{{ tech }}</span>
                </div>

                <a :href="oneCase.githubLink" class="case-card__link" target="_blank">
                    Посмотреть на GitHub <i class="fa-brands fa-github fa-lg" style="color: rgb(0, 3, 6);"></i> →
                </a>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Cases',

    data() {
        return {
            allCases: [
                {
                    id: 1,
                    title: 'Планировщик путешествий',
                    description: 'Travel Planner — это современное веб-приложение для планирования путешествий с интеграцией Яндекс.Карт. Приложение позволяет пользователям создавать, редактировать и публиковать свои путешествия, делиться ими с другими пользователями, а также просматривать опубликованные маршруты.',
                    demoLink: 'https://travel-planner-9pmz.onrender.com/',
                    whatIDid: [
                        'Разработала SPA-архитектуру с разделением на REST API и Vue.js фронтенд.',
                        'Реализовала OAuth-авторизацию через Яндекс ID с автоматической регистрацией.',
                        'Интегрировала Яндекс.Карты: построение маршрутов, выбор отелей и достопримечательностей.',
                        'Создала систему публикации поездок с фильтрацией по статусам.',
                        'Настроила загрузку и хранение фотографий (валидация, облачное хранилище).',
                        'Разработала переиспользуемые Vue-компоненты.',
                        'Написала feature-тесты для всех CRUD-операций.'
                    ],
                    technologies: ['Laravel 10.10', 'Vue 3', 'Vite 4.0', 'HTML/CSS', 'PostgreSQL', 'REST API',
                        'Яндекс.Карты API', 'OAuth', 'Yandex Cloud', 'Docker'],
                    images: [
                        '/images/cases/travel-planner/travel-planner1.png',
                        '/images/cases/travel-planner/travel-planner2.png',
                        '/images/cases/travel-planner/travel-planner3.png',
                        '/images/cases/travel-planner/travel-planner4.png',
                        '/images/cases/travel-planner/travel-planner5.png',
                    ],
                    githubLink: 'https://github.com/Fionina-Elena/travel-planner',
                    currentImageIndex: 0
                },
                {
                    id: 3,
                    title: 'Сервис по починке телефонов',
                    description: 'Система управления сервисным центром по ремонту телефонов.',
                    whatIDid: [
                        'Разработала CRUD-систему управления заявками с JWT-авторизацией и валидацией форм.',
                        'Реализовала логику перехода заявок между 5 статусами с автоматическим мониторингом через CRON.',
                        'Настроила условный рендеринг UI в зависимости от авторизации.Настроила условный рендеринг UI в зависимости от авторизации.',
                        'Настроила работу с API и связью компонентов Vue.js.'
                    ],
                    technologies: [
                        'PHP', 'Laravel', 'Vue.js', 'Vue Router', 'JWT Auth', 'HTML/CSS', 'MySQL', 'Cron'
                    ],
                    images: [
                        '/images/cases/device-fix/devicefix-2.png',
                        '/images/cases/device-fix/devicefix-3.png',
                        '/images/cases/device-fix/devicefix-4.png',
                        '/images/cases/device-fix/devicefix-6.png',
                        '/images/cases/device-fix/devicefix-1.png',
                    ],
                    githubLink: 'https://github.com/Fionina-Elena/device-fix',
                    currentImageIndex: 0
                },
                {
                    id: 4,
                    title: 'Опрос с вариантами ответов',
                    description: 'Одностраничное приложение: пользователь создаёт опрос с вариантами ответов, получает короткую ссылку, переходит по ней и голосует. Результаты видны сразу после голосования.',
                    whatIDid: [
                        'Разработала backend API на Laravel (создание, просмотр, голосование)',
                        'Реализовала генерацию уникальных коротких кодов через паттерн Strategy',
                        'Настроила Vuex для управления состоянием приложения',
                        'Создала Vue Router для навигации между страницами',
                        'Реализовала проверку по IP для предотвращения повторного голосования',
                        'Добавила подсчет и отображение результатов голосования',
                        'Использовала MDB Vue UI Kit для компонентов интерфейса'
                    ],
                    technologies: [
                        ' Laravel 10', 'PHP 8.2', 'Vue 3', 'Vuex', 'Vue Router', 'MySQL'
                    ],
                    images: [
                        '/images/cases/poll-project/pollproject-1.png',
                        '/images/cases/poll-project/pollproject-2.png',
                        '/images/cases/poll-project/pollproject-3.png',
                    ],
                    githubLink: 'https://github.com/Fionina-Elena/poll-project',
                    currentImageIndex: 0
                },
                {
                    id: 5,
                    title: 'Личный менеджер задач',
                    description: 'Полноценное приложение для управления личными задачами. Позволяет создавать, редактировать, удалять задачи и отслеживать их статус (в работе / выполнена). Реализована валидация данных на сервере и кеширование для оптимизации производительности.',
                    whatIDid: [
                        'Разработала backend API на Laravel (CRUD операции)',
                        'Создала frontend на Vue.js с модальными окнами',
                        'Настроила базу данных MySQL через миграции',
                        'Реализовала валидацию данных на сервере',
                        'Добавила кеширование для оптимизации запросов',
                        'Использовала MDB Vue UI Kit для компонентов'
                    ],
                    technologies: ['Laravel 10', 'Vue.js 3', 'MySQL', 'REST API', 'Bootstrap 5', 'Cache', 'Axios', 'Vite'],
                    images: [
                        '/images/cases/task-manager/taskmanager-1.png',
                        '/images/cases/task-manager/taskmanager-2.png',
                    ],
                    githubLink: 'https://github.com/Fionina-Elena/task-manager',
                    currentImageIndex: 0
                },
                {
                    id: 2,
                    title: 'Веб-приложение для управления каталогом туров с публичной частью и админ-панелью.',
                    description: 'Приложение в разработке.',
                    whatIDid: [
                    ],
                    technologies: ['Laravel', 'Vue.js', 'REST API', 'Validation'],
                    images: [
                        '/images/cases/travel-hub/travelhub-2.png',
                        '/images/cases/travel-hub/travelhub-1.png',
                    ],
                    githubLink: '#',
                    currentImageIndex: 0
                },
            ]
        }
    },

    methods: {
        previousImage(caseId) {
            const foundCase = this.allCases.find(item => item.id === caseId)

            if (foundCase.currentImageIndex === 0) {
                foundCase.currentImageIndex = foundCase.images.length - 1
            } else {
                foundCase.currentImageIndex = foundCase.currentImageIndex - 1
            }
        },

        nextImage(caseId) {
            const foundCase = this.allCases.find(item => item.id === caseId)

            foundCase.currentImageIndex = foundCase.currentImageIndex + 1

            if (foundCase.currentImageIndex >= foundCase.images.length) {
                foundCase.currentImageIndex = 0
            }
        },

        goToImage(caseId, imageIndex) {
            const foundCase = this.allCases.find(item => item.id === caseId)
            foundCase.currentImageIndex = imageIndex
        }
    }
}
</script>

<style scoped>
.cases {
    padding: 4rem 2rem;
    max-width: 1400px;
    margin: 0 auto;
}


.cases-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 2rem;
    align-items: start;
}

/* Адаптивность */
@media (max-width: 768px) {
    .cases-grid {
        grid-template-columns: 1fr;
    }
}

/* Карточка */
.case-card {
    background: white;
    border-radius: 8px;
    padding: 1.5rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    display: grid;
    grid-template-rows: auto auto 1fr auto auto auto;
    gap: 1rem;
    height: 100%;
}

/* Карусель */
.case-card__carousel {
    position: relative;
    width: 100%;
    height: 350px;
    overflow: hidden;
    border-radius: 8px;
}

.carousel__image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    cursor: pointer;
}

/* Кнопки */
.carousel__prev,
.carousel__next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1.2rem;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.case-card__carousel:hover .carousel__prev,
.case-card__carousel:hover .carousel__next {
    opacity: 1;
}

.carousel__prev {
    left: 10px;
}

.carousel__next {
    right: 10px;
}

/* Точки */
.carousel__dots {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 8px;
}

.carousel__dots span {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    cursor: pointer;
    transition: background 0.3s ease;
}

.carousel__dots span:hover {
    background: rgba(255, 255, 255, 0.8);
}

.carousel__dots span.active {
    background: white;
}

/* Заголовок и описание */
.case-card__title {
    color: var(--primary-color);
    margin: 0;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.case-card__demo-link {
    font-size: 0.875rem;
    color: var(--primary-color);
    text-decoration: none;
    transition: color 0.3s ease;
}

.case-card__demo-link:hover {
    color: var(--accent-color);
    text-decoration: underline;
}

.case-card__description {
    color: #6b7280;
    line-height: 1.6;
    margin: 0;
    flex: 1;
}

/* Что делала */
.case-card__role {
    color: #374151;
}

.case-card__role ul {
    list-style-position: inside;
    margin-top: 0.5rem;
    margin-bottom: 0;
}

/* Технологии */
.case-card__stack {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.case-card__stack span {
    padding: 0.25rem 0.75rem;
    background: var(--primary-color);
    color: white;
    border-radius: 4px;
    font-size: 0.875rem;
}

/* Ссылка */
.case-card__link {
    margin-top: auto;
    padding: 0.75rem;
    background: transparent;
    color: var(--primary-color);
    text-align: center;
    border: 2px solid var(--primary-color);
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    display: block;
}

.case-card__link:hover {
    background: var(--accent-color);
    color: white;
}
</style>