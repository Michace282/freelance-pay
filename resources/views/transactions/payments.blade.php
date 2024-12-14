@extends('layouts.app')

@section('content')
<div class = "row justify-content-center ">
	<div class = "accountHistory__btn tab__title active__tab text-center fc-white col-md-3 col-xl-2" data-tab = "1">
		Автоматическое пополнение
	</div>
	<div class = "accountHistory__btn tab__title text-center fc-white col-md-3 col-xl-2"  data-tab = "2">
		Ручное пополнение
	</div>
</div>


<div class="row">
	<div class="tabs__content col-12 p-0 m-0">
		<div class="tab-content col-12" data-tab="1">
			<section class = "head">
				<div class = "container-fluid">
					<div class = "row justify-content-center">
						<div class = "head__title d-flex justify-content-center align-items-center col-12">
							<h3 class = "text-center fc-main">Пополнение счета | Автоматический режим</h3>
						</div>
					</div>
				</div>
			</section>
			<section class = "refill">
				<div class = "container-fluid">
					<div class = "row justify-content-center">
						<div class = "refillItems d-flex justify-content-center flex-wrap col-12">
							<form method="POST" action="{{ route('transaction.store') }}" class="form__settings d-flex flex-column justify-content-around" style="max-width: 100%">
								@csrf                                 <div class="form__field d-flex align-items-center">
									<label class = "text-end fc-main">ФИО</label>
									<input style="margin-left: 21px" type="text" id="name" name="fio" required="" placeholder="Ivanov Ivan Ivanovich" class = "bc-block">
									
								</div>
								@error('fio')
									<span class="text-danger">{{ $message }}</span>
									@enderror

								<div class="form__field d-flex align-items-center">
									<label class = "text-end fc-main">Номер банковской карты</label>
									<input  style="margin-left: 21px" type="text" id="cardnumber" name="requisites" required="" placeholder="4731185631783138" class = "bc-block">
									
								</div>
								@error('requisites')
									<span class="text-danger">{{ $message }}</span>
									@enderror

								<div class="form__field d-flex align-items-center">
									<label class = "text-end fc-main">Сумма</label>
									<input  style="margin-left: 21px" type="text" id="sum" name="transaction_amount"  required="" placeholder="Мин.сумма 1500" class = "bc-block">
									
								</div>
								@error('transaction_amount')
									<span class="text-danger">{{ $message }}</span>
									@enderror

								<div class="form__field d-flex align-items-center">
									<label class = "text-end fc-main">Способ пополнения</label>
									<select style="margin-left: 21px" name="method" class = "fc-main bc-block" id="payment-bank">
										<option value="Сбербанк">Сбербанк</option>
										<option value="Тинькофф">Тинькофф</option>
										<option value="Visa/MC">Visa/MC</option>
										<option value="ВТБ">ВТБ</option>
										<option value="Альфа Банк">Альфа Банк</option>
										<option value="РосБанк">РосБанк</option>
										<option value="Газпромбанк">Газпромбанк</option>
										<option value="МИР">МИР</option>
										<option value="РНКБ">РНКБ</option>
									</select>
									
								</div>
								@error('method')
									<span class="text-danger">{{ $message }}</span>
									@enderror
                                    <!--<div class="form__field align-items-center" id="payment-bank-name" style="display: none;">
                                        <label class = "text-end fc-main">Банк</label>
                                        <input  style="margin-left: 21px" type="text" id="bank-name" required="" placeholder="Московский Кредитный Банк" class = "bc-block">
                                    </div>-->
                                    <!-- <button style="margin-top: 15px" class="form__btn border-left fc-white bc-btn-g align-self-center d-block create__payment openModal" data-modal = "3" data-toggle="modal"
                                    	data-target="#myModal" onclick="setButtonsStyles()" disabled>Пополнить1</button> -->

                                    	<button style="margin-top: 15px" 
										class="form__btn border-left fc-white 
										 bc-btn-g align-self-center d-blockd-block create__payment openModal" 
										data-modal = "3" 
										data-toggle="modal"
                                        data-target="#myModal"  
                                    	type="submit"
										 >Пополнить
										</button>  

										
                                    	<p class="text-end fc-main" style="margin-top: 20px; text-align: center">Учитывайте комиссию при пополнении 2% + 50 рублей</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="tab-content col-12" data-tab="2" style="display: none">
                	<section class = "head">
                		<div class = "container-fluid">
                			<div class = "row justify-content-center">
                				<div class = "head__title d-flex justify-content-center align-items-center col-12">
                					<h3 class = "text-center fc-main">Пополнение счета Monero (XMR) | Ручной режим</h3>
                				</div>
                			</div>
                		</div>
                	</section>
                	<section class = "refill">
                		<div class = "container-fluid">
                			<div class = "row justify-content-center">
                				<div class = "refill__warning fc-main col-12 col-md-10 col-xl-8">
                					<p>ВНИМАНИЕ!<br>
                					Оплата заявки на обменнике происходит в ручном режиме. Вам требуется оплатить её в приложении банка переводом по реквизитам, которые предоставит обменник, после перевода не забудьте нажать кнопку "Я оплатил" на обменнике.</p>

                					<p>ВАЖНО! Курс по заявке будет зафиксирован на 1 час! <br>
                					Если в течение этого времени не получено ни одно подтверждение от сети Monero, тогда курс зафиксируется в момент получения 1-го подтверждения, обмен выполнен после поступления средств на наш кошелек Monero.</p>
                				</div>
                			</div>
                			<div class = "row justify-content-center">
                				<div class = "refillItems d-flex justify-content-center flex-wrap col-12">
                					<div class = "refillItems__item border-right bc-akcent fc-white col-8 col-md-7 col-xl-2">
                						<div class = "refillItems__item__number">1</div>
                						<div class = "refillItems__item__txt">
                							<p>Обратитесь в чат поддержки, укажите свой банк и сумму пополнения.
                							Оператор подберет для Вас обменник.</p>
                						</div>
                					</div>
                					<div class = "refillItems__item border-right bc-akcent fc-white col-8 col-md-7 col-xl-2">
                						<div class = "refillItems__item__number">2</div>
                						<div class = "refillItems__item__txt">
                							<p>Создайте заявку на сервисе обменника. Реквизиты кошелька Monero (XMR) сервиса:</p>
                							<p><span>49kyqEhg5tZBk21axUEbm7JgNbyVZB9Bq4QjasQ7Zg7ueHmjouPwmXbRqbZT9dzmDkSKfWaqe8J2yA6jaFmgfj9mV63DyX7</span></p>
                						</div>
                					</div>
                					<div class = "refillItems__item border-right bc-akcent fc-white col-8 col-md-7 col-xl-2">
                						<div class = "refillItems__item__number">3</div>
                						<div class = "refillItems__item__txt">
                							<p>Следуйте инструкциям обменника. Заполняете поля в заявке, указываете соответствующие данные в необходимые поля</p>
                						</div>
                					</div>
                					<div class = "refillItems__item border-right bc-akcent fc-white col-8 col-md-7 col-xl-2">
                						<div class = "refillItems__item__number">4</div>
                						<div class = "refillItems__item__txt">
                							<p>Предоставьте скриншот обработанной заявки в чат поддержки.</p>
                						</div>
                					</div>
                				</div>
                			</div>
                		</div>
                	</section>
                </div>



            </div>
            @endsection