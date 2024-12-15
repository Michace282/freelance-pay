@extends('layouts.app')

@section('content')
<section class = "head">
    <div class = "container-fluid">
        <div class = "row justify-content-center">
            <div class = "head__title text-center col-12">
                <h3 class = "text-center fc-main">Мои сделки</h3>
            </div>
        </div>
    </div>
</section>
<section class = "accountInfo">
    <div class = "container-fluid">
        <div class = "row">
            <input type="number" hidden id="deal_id" value="172">
            <div class = "accountInfo__title d-none d-xl-flex align-items-center position-relative">
                <h4 class = "fc-main">Сделка №{{$deal->id}}</h4>
            </div>
        </div>
        @if ($deal->status == 'Завершена')
        <div class="fc-lg status">
           <!-- Завершена  -->
           <div class="row justify-content-center">
            <div class="accountInfo__description bc-akcent fc-main border-left d-flex justify-content-center col-12 col-xl-10">
                <div class="account__info__desription__title d-flex flex-column justify-content-between align-items-start col-12 col-xl-11">
                    <div class="deal__title d-flex align-items-center justify-content-between col-12">
                        <div class="d-flex align-items-center col-7">
                            <!-- Text Section -->
                            <div class="status-text d-flex flex-column">
                                <h4 class="fc-white">Статус</h4>
                                <h4 class="fc-white">{{$deal->status}}</h4>
                            </div>
                            <!-- Image Section -->
                            <div class="status-image ms-3">
                                <img src="/img/process5.svg" alt="Status Image">
                            </div>
                        </div>
                    </div>

                    <!-- Status Line -->
                    <div class="deal__statusLine d-xl-block">
                        <div class="deal__finished"></div>
                    </div>
                </div>
            </div>
        </div>                       
    </div>
    @endif


    @if ($deal->status == 'Ожидает оплаты')
    <div class="fc-lg status">
      <!-- Ожидается оплата -->    
      <div class="row justify-content-center">
        <div class="accountInfo__description bc-akcent fc-main border-left d-flex justify-content-center col-12 col-xl-10">
            <div class="account__info__desription__title d-flex flex-column justify-content-between align-items-start col-12 col-xl-11">
                <div class="deal__title d-flex align-items-center justify-content-between col-12">
                    <div class="d-flex align-items-center col-7 ">
                        <div class="status-text d-flex flex-column">
                            <h4 class="fc-white">Статус </h4>
                            <h4 class="fc-white">Ожидается оплата </h4>
                        </div>
                        <div class="status-image ms-3">
                            <img src="/img/process2.svg">
                        </div>
                    </div>                            
                </div>
                <div class="deal__statusLine d-xl-block">
                    <div class="deal__waitingPay"></div>
                </div>  
                
            </div>        
        </div>
    </div>                         
</div>
@endif

<!-- На согласовании -->     
@if ($deal->status == 'На согласовании')
<div class="fc-sog status">
    <div class = "row justify-content-center">
        <div class = "accountInfo__description bc-akcent fc-main border-left d-flex justify-content-center col-12 col-xl-10">
            <div class = "account__info__desription__title d-flex flex-column justify-content-between align-items-start col-12 col-xl-11">

                <div class = "deal__title d-flex align-items-center justify-content-between col-12" >
                    <div class = "d-flex align-items-center col-7 ">
                        <div class="status-text d-flex flex-column">
                            <h4 class = "fc-white">Статус </h4>
                            <h4 class = "fc-white">На согласовании </h4>
                        </div>
                        <div class="status-image ms-3">
                         <img src = "/img/process2.svg">
                     </div>
                 </div>                            

             </div>

             <div class="deal__statusLine d-xl-block">
                <div class="deal__accept"></div>
            </div>  

        </div>
    </div>        

</div> 
</div>
@endif
@if ($deal->status == 'Оплачена')
<div class="fc-g status">
    <!--  Оплачена -->
    <div class = "row justify-content-center">
        <div class = "accountInfo__description bc-akcent fc-main border-left d-flex justify-content-center col-12 col-xl-10">
            <div class="account__info__desription__title justify-content-between d-flex align-items-center col-12 col-xl-11">
                <div class="flex-column justify-content-between align-items-start">
                    <div class = "deal__title d-flex align-items-center justify-content-between col-12" >
                        <div class = "d-flex align-items-center col-7 ">
                            <div class="status-text d-flex flex-column">
                                <h4 class = "fc-white">Статус </h4>
                                <h4 class = "fc-white">Оплачена </h4>
                            </div>
                            <div class="status-image ms-3">
                                <img src = "/img/process3.svg">
                            </div>
                        </div> 
                        <div class = "d-flex align-items-center col-2"></div>     
                        <div class = "d-flex align-items-center col-3">
                            <button class="d-flex align-items-center justify-content-between form__btn fc-white scoped_arbit_button bc-secondary  " onclick="handleAction('{{ route('deal.arbitDeal', ['dealId' => $deal->id]) }}')">
                                Арбитраж
                                <img src = "/img/danger.svg">
                            </button>
                        </div>       
                    </div>
                    <div class="deal__statusLine d-xl-block">
                        <div class="deal__paid"></div>
                    </div>              
                </div>

            </div>

        </div>

    </div>                       
</div>
@endif
@if ($deal->status == 'Арбитраж')
<div class = "fc-alert status">
    <!-- Арбитраж  -->
    <div class = "row justify-content-center">
        <div class = "accountInfo__description bc-akcent fc-main border-left d-flex justify-content-center col-12 col-xl-10">
            <div class="account__info__desription__title justify-content-between d-flex align-items-center col-12 col-xl-11">
                <div class="flex-column justify-content-between align-items-start">
                    <div class = "deal__title d-flex align-items-center justify-content-between col-12" >
                        <div class = "d-flex align-items-center col-7 ">
                            <div class="status-text d-flex flex-column">
                                <h4 class = "fc-white">Статус </h4>
                                <h4 class = "fc-white">Арбитраж </h4>
                            </div>
                            <div class="status-image ms-3">
                                <img src = "/img/warning.svg">
                            </div>
                        </div>                            

                    </div>
                    <div class="deal__statusLine d-xl-block">
                        <div class="deal__arbitr"></div>
                    </div>  
                </div>
            </div>
        </div>        
    </div>
</div>                          
</div>
@endif






</section>
<section class = "payments">
    <div class = "container-fluid p-0">
        <div class = "row justify-content-center">
            <div class="newDeal__payments fc-main col-12 col-xl-8">
                <div class = "newDeal__payment d-flex flex-wrap align-items-center">
                    <span class = "col-6 col-xl-4">Название сделки</span>
                    <span class = "col-6 col-xl-7">{{ $deal->deal_title }}</span>
                </div>
                <div class = "newDeal__payment d-flex flex-wrap align-items-center">
                    <span class = "col-6 col-xl-4">Исполнитель</span>
                    <span class = "col-6 col-xl-7">{{ $deal->executor->login }}</span>
                </div>
                <div class = "newDeal__payment d-flex flex-wrap align-items-center">
                    <span class = "col-6 col-xl-4">Заказчик</span>
                    <span class = "col-6 col-xl-7">{{ $deal->client->login }}</span>
                </div>
                <div class = "newDeal__payment d-flex flex-wrap align-items-center">
                    <span class = "col-6 col-xl-4">Описание сделки</span>
                    <span  class = "col-6 col-xl-7">{{ $deal->description }}</span>
                </div>
                <div class = "newDeal__payment d-flex flex-wrap">
                    <span class = "col-6 col-xl-4">Сумма сделки</span>
                    <div>
                        <span class = "col-6 col-xl-7">{{ $deal->amount }}₽</span>
                        <div class = "commission__info d-flex fc-secondary justify-content-between">
                            <span>Комиссия сделки</span>
                            <span>200₽</span>
                        </div>
                        <div class = "commision__info d-flex fc-secondary justify-content-between">
                            <span>Итоговая сумма сделки</span>
                            <span>{{ $deal->amount + 200 }}₽</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "row justify-content-end">
            <div class="payments__buttons text-center flex-wrap justify-content-center">


                @if ($deal->status === 'Ожидание начала работы' && auth()->id() === $deal->executor_id)
                <!-- Кнопка для принятия участия -->
                <div class="row justify-content-center"> <button 
                    class="form__btn bc-secondary fc-white border-right"
                    onclick="handleAction('{{ route('deal.accept', ['dealId' => $deal->id]) }}')"
                    >
                    Принять сделку
                </button></div>
                @endif

                @if ($deal->status === 'Ожидание оплаты' && auth()->id() === $deal->client_id)
                <!-- Кнопка для подтверждения оплаты -->
                <div class="row justify-content-center"> <button 
                    class="form__btn bc-secondary fc-white border-right"
                    onclick="handleAction('{{ route('deal.confirmPayment', ['dealId' => $deal->id]) }}')"
                    >
                    Оплатить сделку
                </button></div>
                @endif

                @if ($deal->status === 'В работе' && auth()->id() === $deal->client_id)
                <!-- Кнопка для завершения сделки -->
                <div class="row justify-content-center"> <button 
                    class="form__btn bc-secondary fc-white border-right"
                    onclick="handleAction('{{ route('deal.confirmPaymentBuyer', ['dealId' => $deal->id]) }}')"
                    >
                    Завершить сделку
                </button></div>
                @endif

                @if ($deal->status === 'Арбитраж' && (auth()->user()->hasRole('moderator') || auth()->user()->hasRole('admin')))
                <div class="row justify-content-center">
                    <button class="form__btn bc-secondary fc-white border-right" onclick="handleAction('{{ route('deal.cancelArbitDeal', ['dealId' => $deal->id]) }}')">ОТМЕНИТЬ АРБИТРАЖ</button>
                </div>
                <div class="row justify-content-center">
                    <button class="form__btn bc-secondary fc-white border-right" onclick="handleAction('{{ route('deal.finishArbitDealByExecutor', ['dealId' => $deal->id]) }}')">УДОВЛЕТВОРИТЬ В ПОЛЬЗУ ИСПОЛНИТЕЛЯ</button>
                </div>
                <div class="row justify-content-center">
                    <button class="form__btn bc-secondary fc-white border-right" onclick="handleAction('{{ route('deal.finishArbitDealByClient', ['dealId' => $deal->id]) }}')">УДОВЛЕТВОРИТЬ В ПОЛЬЗУ ЗАКАЗЧИКА</button>
                </div>
                @endif

            </div>                    

        </section> 

        <!-- resources/views/chat.blade.php -->
        <section class="chat">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="chatBlock bc-chat fc-main col-12 col-xl-10 p-0">
                        <div class="chatBlock__head d-flex">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="chatBlock__head__title text-center">
                                    <span>Чат с пользователем {{ ($deal->role == 'Исполнитель') ? $deal->executor->login : $deal->client->login }}</span>
                                </div>
                            </div>
                            <div class="chatBlock__head__settings d-flex justify-content-end col-1">
                                <span>...</span>
                            </div>
                        </div>

                        <div class="chatBlock__main col-12" id="chatMessages">
                            <!-- Сообщения чата будут отображаться здесь -->
                        </div>

                        <form id="chatForm" action="{{ route('chat.sendMessage') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="chatBlock__message d-flex justify-content-between">
                                <div class="chatBlock__message__field d-flex">
                                    <input type="text" class="bc-chat" id="message" name="message" placeholder="Сообщение">
                                </div>
                                <div class="chatBlock__message__btn d-flex justify-content-end">
                                    <button type="submit">Отправить</button>
                                </div>
                            </div>
                        </form>
                        @if (auth()->user()->hasRole('moderator') || auth()->user()->hasRole('admin'))
                        <form id="chatFormAdmin" action="{{ route('chat.sendMessage') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="chatBlock__message d-flex justify-content-between">
                              <div class="chatBlock__message__field d-flex">
                                <input type="text" class="bc-chat" id="messageAdmin" name="messageAdmin" placeholder="Написать от лица администрации">
                            </div>
                            <div class="chatBlock__message__btn d-flex justify-content-end">
                                <button type="submit">Отправить</button>
                            </div>
                        </div>
                    </form>
                    @endif  
                </div>
            </div>
        </div>
    </section>

    <script>
        function handleAction(url) {
            if (!confirm('Вы уверены?')) return;

            fetch(url.replace('http://','//'), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
            location.reload(); // Обновляем страницу для обновления статуса
        } else {
            alert(data.error || 'Произошла ошибка.');
        }
    })
            .catch(error => console.error('Ошибка:', error));
             // Обновляем страницу с задержкой
setTimeout(() => {
    location.reload();
}, 500); // 2000 миллисекунд = 2 секунды
        }
        function loadMessages(dealId) {
            fetch(`/chat/${dealId}`)
            .then(response => response.json())
            .then(data => {
                const chatMessages = document.getElementById('chatMessages');
            chatMessages.innerHTML = ''; // Очистка чата
            
            data.forEach(message => {
                let messageElement = document.createElement('div');
                
                // Определяем класс для сообщения
                const isSender = message.sender_id === {{ auth()->id() }}; // Сравнение с текущим пользователем
                messageElement.className = isSender
                ? 'chatBlock__main__sender'
                : (message.message_type === 'system' ? 'chatBlock__main__system' : 'chatBlock__main__user');

                // Генерируем содержимое сообщения
                if (isSender) {
                    messageElement.innerHTML = `
                    <div id="id_chat_message">
                    <div class="chatBlock__main__sender d-flex flex-column justify-content-end align-items-end col-12">
                    <div class="chatBlock__main__message bc-block border-right">
                    <span>${message.message}</span>
                    <div class="chatBlock__main__message__info size12 d-flex justify-content-end">
                    <span class="fc-secondary">7:01pm</span>
                    </div>
                    </div>
                    </div>
                    </div>
                    `;
                } else {
                    messageElement.innerHTML = `
                    <div id="id_chat_message">
                    <div class="chatBlock__main__reciever d-flex flex-column justify-content-end col-12">
                    <div class="chatBlock__main__reciever__name">
                    <span>${message.message_type === 'system' ? 'Система' : (message.message_type === 'admin' ? 'Администрация' : message.sender)}</span>
                    </div>
                    <div class="chatBlock__main__message bc-block border-left">
                    <span>${message.message}</span>
                    <div class="chatBlock__main__message__info size12 d-flex justify-content-end">
                    <span class="fc-secondary">${message.formattedCreatedAt}</span>
                    </div>
                    </div>
                    </div>
                    </div>
                    `;
                }
                
                // Добавляем сообщение в чат
                chatMessages.appendChild(messageElement);
            });
        });
        }

// Отправка сообщения через AJAX
        document.getElementById('chatForm').addEventListener('submit', function (e) {
            e.preventDefault();
    const messageInput = document.getElementById('message'); // Получаем сам элемент
    const message = messageInput.value; // Получаем значение из поля ввода
    const dealId = {{ $deal->id }};
    const messageType = 'user'; 
    const chatMessages = document.getElementById('chatMessages');

    fetch('/chat/send', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ message, deal_id: dealId, message_type: messageType })
    })
    .then(response => response.json())
    .then(() => {
        messageInput.value = ''; // Очищаем поле ввода
        // Автопрокрутка вниз
        chatMessages.scrollTop = chatMessages.scrollHeight;
        loadMessages(dealId); // Обновляем сообщения
    });
});
        if (document.getElementById('chatFormAdmin')) {
    // Отправка сообщения через AJAX
            document.getElementById('chatFormAdmin').addEventListener('submit', function (e) {
                e.preventDefault();
    const messageInput = document.getElementById('messageAdmin'); // Получаем сам элемент
    const message = messageInput.value; // Получаем значение из поля ввода
    const dealId = {{ $deal->id }};
    const messageType = 'admin'; 
    const chatMessages = document.getElementById('chatMessages');

    fetch('/chat/sendAdmin', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ message, deal_id: dealId, message_type: messageType })
    })
    .then(response => response.json())
    .then(() => {
        messageInput.value = ''; // Очищаем поле ввода
        // Автопрокрутка вниз
        chatMessages.scrollTop = chatMessages.scrollHeight;
        loadMessages(dealId); // Обновляем сообщения
    });
});
        }


        window.onload = () => {
            loadMessages({{ $deal->id }}); 
            setInterval(() => loadMessages({{ $deal->id }}), 5000); 
        };

    </script>

    @endsection