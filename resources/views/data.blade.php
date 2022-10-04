<?php
$delivery_types = ['' => 'Не выбрано', '1' => 'Самовывоз', '2' => 'Доставка'];
?>
<div class="card-body order-table"  id="element-to-print">
    <div class="form-group">
        <img src="{{ asset('img/logo.png') }}" alt="" style="margin-bottom: 30px">
    </div>
    <?php if( isset($product) && $product ): ?>
    <div class="form-group">
        <label for="inputDate">Наименование товара: </label>
        <a href="/product/<?= $product['alias'] ?>" target="_blank"> <?= $product['title'] ?></a>
    </div>
    <?php endif; ?>
    <div class="form-group">
        <label for="inputDate">№ заказа: </label> <?= $id ?>
    </div>
    <div class="form-group col_2">
        <label for="inputDate">Дата заказа: </label> <?= date('dd.MM.Y H:m:s', strtotime($date)) ?>
    </div>
    <div class="form-group col_2">
        <label for="inputName">Способ доставки:</label> <?= (array_key_exists($delivery, $delivery_types)) ? $delivery_types[$$delivery] : '-' ?>
    </div>
    <div class="form-group col_2">
        <label for="inputName">ФИО:</label> <?= $firstname ?> <?= $lastname ?>
    </div>
    <?php if( $city ): ?>
    <div class="form-group col_2">
        <label for="inputName">Адрес доставки:</label> <?= $city ?> <?=  $address ?>
    </div>
    <?php endif; ?>
    <?php if( $iin ): ?>
    <div class="form-group">
        <label for="inputEmail">ИНН:</label> <?= $iin ?>
    </div>
    <?php endif; ?>
    <?php if( $phone ): ?>
    <div class="form-group">
        <label for="inputPhone">Телефон:</label> <a href="tel:+<?= preg_replace('/[^0-9]/', '', $phone) ?> "><?= $phone ?></a>
    </div>
    <?php endif; ?>

    <?php if( $message ): ?>
    <div class="form-group">
        <label for="inputName">Комментарий к заказу:</label> <?= $message ?>
    </div>
    <?php endif; ?>

    <?php if($product): ?>
    <div class="form-group">
        <label for="inputName">Товар:</label> <a href="/products/<?= $product['alias'] ?>"><?= $product['title'] ?></a>
    </div>
    <?php endif; ?>

    <?php if( $data ): ?>
    <div class="order_info">
            <?= $data ?>
    </div>
    <?php endif; ?>
    <?php if( $senddata ): ?>
        <?php
        $json_data = json_decode($senddata, true);
        ?>
    <div class="order_info">
        <table>
            <thead>
            <tr>
                <th width="50">ID</th>
                <th width="150">Картинка</th>
                <th>Название</th>
                <th width="150">Стоимость</th>
                <th width="100">Кол-во</th>
                <th width="150">Общая сумма</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach( $json_data as $item_id => $item ): ?>
            <tr class="order-row">
                <td><?= $item_id ?></td>
                <td><img src="<?= $item['src'] ?>" alt=""></td>
                <td><?= $item['name'] ?></td>
                <td><?= number_format($item['price'], 0, '', ' ') . ' тг'; ?></td>
                <td><?= $item['quantity'] . ' шт' ?></td>
                <td><?= number_format($item['totalprice'], 0, '', ' ') . ' тг'; ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
    <div class="form-group col_4" style="display: flex; flex-direction: column; align-items: center; margin-top: 30px;">
        <label>Доставка товара в течении дня! (доставка по городу Астана бесплатно до подъезда.)</label>
        <label>С заказом ознакомлен:_______</label>
        <label>Улица: Пушкина</label>
        <label>Почта: test@mail.ru</label>
        <label>При необходимости свяжитесь с поддержкой</label>
        <label>Тел: +7-707-777-77-77</label>
    </div>
</div>
