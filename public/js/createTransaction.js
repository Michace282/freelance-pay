let token = $("input[name='_token']").val();
let closeModalFlag = false;
let paidButton = document.querySelector('.trigger-button.paid');

document.getElementById('payment-bank').addEventListener('change', function() {
    var selectedBank = this.value;
    var paymentBankName = document.querySelector('#payment-bank-name');

    /*if (selectedBank == 'МИР' || selectedBank == 'РНКБ' || selectedBank == 'Visa/MC') {
        paymentBankName.style.display = 'flex';
    } else {
        paymentBankName.style.display = 'none';
    }*/
});

const input1 = document.getElementById('name');
const input2 = document.getElementById('sum');
const input3 = document.getElementById('cardnumber');
const button = document.querySelector('.create__payment');

// Функция для проверки заполненности input'ов
function checkInputs() {
    const value1 = input1.value;
    const value2 = input2.value;
    const value3 = input3.value;

    // Проверяем, заполнены ли оба input'a и имеют разные типы данных
    if (value1 !== '' && value2 !== '' && value3 !== '' && value2 >= 1500 && (!isNaN(value2) && !isNaN(value3)) && value3.length >= 16 && value3.length <= 18) {
        button.disabled = false; // Разрешаем нажимать на кнопку
    } else {
        button.disabled = true; // Запрещаем нажимать на кнопку
    }
}

// Запускаем проверку при каждом изменении значения в input'ах
input1.addEventListener('input', checkInputs);
input2.addEventListener('input', checkInputs);
input3.addEventListener('input', checkInputs);

document.getElementById("cardnumber").addEventListener("input", function(event) {
    let input = event.data;
    if (input && isNaN(parseInt(input))) {
        // Если введен не цифровой символ, удалить его
        let newValue = this.value.replace(input, '');
        this.value = newValue;
    }
    // Удаление пробелов
    this.value = this.value.replace(/\s/g, '');
});

document.getElementById("sum").addEventListener("keydown", function(event) {
    if (event.key === " ") {
        event.preventDefault();
    }
});

function setButtonsStyles() {
    $('.btn.trigger-button.continue').prop('disabled', false);
    $('.trigger-button.continue').find('p').text('Да');
    $('.loading-img').css('display', 'none');
    $('.btn.trigger-button.continue').css("display", "flex");
    $('.modal__payment h3').text("Внимание!");
    $('.modal__payment .modal__text').text("Вы уверены, что хотите продолжить пополнение счета?");
    paidButton.style.display = "none";
}

function createTransaction() {

    $('.btn.trigger-button.continue').find('p').text('');
    $('.btn.trigger-button.continue').prop('disabled', true);
    $('.loading-img').css('display', 'block');


    setTimeout(() => {
    
        $('.btn.trigger-button.continue').find('p').text('Да');
        $('.btn.trigger-button.continue').prop('disabled', false);
        $('.loading-img').css('display', 'none');

 
        const currentModal = document.querySelector('.Modal[data-modal="3"]');
        const paymentModal = document.querySelector('.Modal[data-modal="5"]');

        if (currentModal) currentModal.style.display = 'none';
        if (paymentModal) paymentModal.style.display = 'flex';

    
        const timerElement = paymentModal.querySelector('.modal__text strong');
        let timeLeft = 1200; 
        const timerInterval = setInterval(() => {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            timerElement.textContent = `${minutes.toString().padStart(2, '0')} минут ${seconds.toString().padStart(2, '0')} секунд`;
            timeLeft--;
            if (timeLeft < 0) {
                clearInterval(timerInterval);
                timerElement.textContent = '00:00';
            }
        }, 1000);
    }, 1000); 
}


function paid() {

    const currentModal = document.querySelector('.Modal[data-modal="5"]');

    const paymentModal = document.querySelector('.Modal[data-modal="6"]');

    if (currentModal) currentModal.style.display = 'none';
    if (paymentModal) paymentModal.style.display = 'flex';

    const form = $('.refill form'); // Укажите ID формы
const url = form.attr('action'); // URL действия формы
const data = form.serialize(); // Собираем данные формы

$.ajax({
    url: url.replace('http://', '//'),
    method: 'POST',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Передаем CSRF-токен
    },
    data: data, // Данные из формы
    success: function (response) {
        console.log('Успех:', response);
        // Выполняем действия при успешном запросе
    },
    error: function (error) {
        console.error('Ошибка:', error);
    }
});
}

window.addEventListener("beforeunload", function(event) {
    if (paidButton.style.display !== "none") {
        event.preventDefault();
        event.returnValue = 'Вы не подтвердили оплату. Нажмите на кнопку "Я оплатил(а)".';
    }
});
