<template>
    <section class="how-i-work">
        <div class="how-i-work_grid">
            <div class="how-i-work_column">
                <div class="how-i-work_title">Подход к задачам</div>
                <p>
                    Начинаю с понимания задачи: что нужно, зачем, какие есть ограничения.
                    Если задача простая — сразу пишу решение.
                    Если сложная — сначала продумываю архитектуру и разбиваю на подзадачи.
                    Пишу код итеративно: сначала рабочий вариант, затем улучшаю и рефакторю.
                    Правило: работающее простое решение лучше, чем идеальное, но незаконченное.
                </p>
            </div>
            <div class="how-i-work_column">
                <div class="how-i-work_title">Как я использую AI в работе</div>
                <p>Простой код пишу сама — это быстрее, чем объяснять задание. AI включаю там, где он реально
                    экономит
                    время:</p>
                <ul>
                    <li><strong>Сложная логика и архитектура</strong> — обсуждаю подходы, оцениваю варианты</li>
                    <li><strong>Незнакомая технология</strong> — изучаю документацию вместе с AI</li>
                    <li><strong>Рутина</strong> — генерирую однотипный код</li>
                    <li><strong>Дебаг</strong> — AI помогает посмотреть на проблему иначе</li>
                    <li><strong>Рефакторинг</strong> — проверяю код на чистоту</li>
                </ul>
            </div>
        </div>

    </section>
</template>

<script setup>
</script>

<style scoped>
.how-i-work {
    padding: 3rem 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.how-i-work_grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12rem;
    margin-top: 2rem;
}

.how-i-work_column {
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.how-i-work_title {
    display: inline-block;
    margin-left: 2rem;
    text-align: center;
    font-weight: 600;
    margin-top: 5px;
    margin-bottom: 2rem;
    font-size: 25px;
    border: 1px solid black;
    border-radius: 50%;
    padding: 10px 30px;
}
</style>