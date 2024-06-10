<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Витрина</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>

<header class="header">
<div class="container">
    <div class="header-top">
        <div class="logo">
            <img src="/img/logo.png" alt="Народный Займ">
        </div>

        <div class="timer">
            <span>Деньги у вас в:</span>
            <span id="timer">5:55</span>
        </div>
    </div>

</div>
    <div class="ticker">
        <marquee behavior="scroll" direction="left">
            <span>Анна И. получила 18 200₽ &#9679; МоскваДенис К. получил 13 500₽ &#9679; Санкт-ПетербургЕлена З. получила 22 300₽ &#9679; НовосибирскСергей М. получил 16 800₽ &#9679; ЕкатеринбургКсения Л. получила 19 700₽ &#9679; КазаньИван Н. получил 14 900₽, Ростов-на-Дону</span>
        </marquee>
    </div>
    <div class="header-bottom">
       <div class="container">
          <div class="left">
              <h1>.Вам присвоен статус <strong>хорошего</strong> клиента, вы можете взять займ в следующих МФО:</h1>
              <div class="recommendation">
                  <span>РЕКОМЕНДАЦИЯ</span>
                  <p>Отправьте онлайн-заявку минимум в 4 компании для 100% получения денег!</p>
              </div>
          </div>
           <div class="right">
               <img src="/img/robot.png" alt="">
           </div>
       </div>
    </div>
</header>
<div class="container">
    <h1>Лучшие предложения</h1>
    <div class="card-grid">
        <?php foreach ($offers as $offer): ?>
            <div class="card">
            <div class="card-header">
                    <img src="/uploads/<?php echo $offer['image']; ?>" alt="<?php echo $offer['name']; ?>" class="img-thumbnail mr-3">
                <div class="label">
                    <img src="/img/svgexport-4.svg" alt="">
                </div>
            </div>
            <div class="card-stars"> 
                    <span class="rating">5.0</span>
                    <div class="stars">
                        ★★★★★
                     </div>
            </div>
                <div class="card-content">
                    <p>Сумма: <span class="summ">30 000 ₽</span></p>
                    <p>Первый займ: <span><b>бесплатно</b></span></p>
                    <p>Срок: <span><b>20 дней</b></span></p>
                    <p class="license">Лиц. №2110552000304</p>
                    <a href="/tracker?utm_source=<?php echo urlencode($source); ?>&offer_id=<?php echo $offer['id']; ?>">Получить деньги</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <br></div>
<div class="container-full">
<div class="container">
    <div class="info-block">
        <h2>Условия получения:</h2>
        <p>Первый займ до 10 000 рублей выдается бесплатно в случае своевременного погашения; В случае нарушения сроков, размер неустойки составляет 0,10% от суммы просрочки в день, но не более 10% от суммы кредита; В случае длительной задержки выплаты информация будет передана в БКИ.</p>
        <h2>Информация о полной стоимости займа и пример расчета:</h2>
        <p>ПСК (полная стоимость кредита) в процентах составляет от 0 до 292% годовых.</p>
        <p>Пример:</p>
        <p>Заем в размере 10 000 рублей выдан на 61 дней с пролонгацией. В году 365 дней, по договору ставка составляет 0,8% в день (годовая ставка, соответственно будет равна 292%). Сумма процентов за год составляет 29 200 руб. (10 000*292% = 29 200), за 1 день 80 руб. (29 200/365 = 80), за 61 день соответственно 4 880 руб. (80*61 = 4 880). Общая сумма платежа составляет 14 880 руб. (10 000 руб. основной долг + 4 880 руб. проценты). Процентная ставка по займам составляет от 0 до 292% годовых; По потребительским кредитам и кредитным картам - от 17 до 31% годовых.</p>
        <h2>Последствия невыплаты заемных средств:</h2>
        <p>В случае невозвращения в условленный срок суммы кредита или суммы процентов за пользование заемными средствами кредитор вынуждено начислит штраф за просрочку платежа. Большинство кредиторов идут на уступки и дают 3 дополнительных рабочих дня для оплаты. Они предусмотрены на случай, к примеру, если банковский перевод занял больше времени, чем обычно. Однако, в случае неполучения от Вас какой-либо реакции в течение продолжительного времени, будет начислен штраф за просрочку срока погашения размером в среднем 0,10% от первоначальной суммы долга за займ, от 0,03% от суммы задолженности в среднем для потребительских кредитов и кредитных карт. При несоблюдении Вами условий по погашению кредита и займов, данные о Вас могут быть переданы в бюро кредитных историй, а задолженность - коллекторскому агентству для взыскания долга. О всех приближающихся сроках платежа кредитор своевременно информирует Вас по СМС или электронной почте. Рекомендуем Вам вносить платеж в день получения данных напоминаний. Погашая задолженность в срок, Вы формируете хорошую кредитную историю, что повышает Ваши шансы в дальнейшем получить кредит на более выгодных условиях. Предложение не является офертой. Конечные условия уточняйте при прямом общении с кредиторами.</p>
    </div>
</div>
</div>

<footer class="footer">
    <div class="footer-content">
        <div class="logo">
            <img src="/img/logo.png" alt="Народный Займ">
            <p>Сервис подбора займов</p>
        </div>
        <div class="footer-text">
            <p>Общество с ограниченной ответственностью «БСМЕДИА» ОГРН 1216300005536</p>
                <p>443080, Россия, г. Самара, Московское шоссе, д. 43, оф. 706. Телефон: +7(846)2140525</p>
                <p>Находится в реестре операторов, осуществляющих обработку персональных данных, Приказ № 30 от 18.03.2021 Рег. № 63-21-006490</p>
                <p>Если хотите разместить предложение на нашей витрине, вам нужны клиенты или вы хотите работать с нами — заполните форму Сотрудничество.</p>
                <p>Вся представленная на сайте информация, касающаяся финансовых услуг, носит информационный характер и ни при каких условиях не является публичной офертой, определяемой положениями статьи 437 Гражданского кодекса РФ.</p>
                <p>Нажатие на кнопку "Получить деньги", а также последующее заполнение тех или иных форм, не накладывает на владельцев сайта никаких обязательств.</p>
                <p>Все материалы, размещенные на сайте являются собственностью владельцев сайта, либо собственностью организаций, с которыми у владельцев сайта есть соглашение о размещении материалов.</p>
                <p>Для аналитических целей на сайте работает система статистики, которая собирает информацию о посещениях страниц сайта, заполненных формах и т.д. Сотрудники компании имеют доступ к этой информации.</p>
                <p>Регистрируясь на сайте или оставляя тем, или иным способом свои персональные данные (информацию о себе), Вы предоставляете право сотрудникам компании обрабатывать вашу персональную информацию.</p>
                <p>Данное соглашение действует бессрочно и может быть отозвано путем отправки заявления в форме Отказа от рекламных предложений и услуг подбора указав номер телефона, на который оставлена заявка.</p>
                <p>Важно: предоплату берут только мошенники!</p>
                <p>Сервис бесплатный - за предоставление информации комиссии не взимается.</p>
        </div>
    </div>
</footer>
<script src="/js/timer.js"></script>
</body>
</html>
