Новое сообщение devprofile

Имя: {{ $data['name'] }}
Телефон: {{ $data['phone'] ?? 'Не указан' }}
Email: {{ $data['email'] }}
Комментарий: {{ $data['message'] }}

Дата: {{ now()->format('d.m.Y H:i') }}