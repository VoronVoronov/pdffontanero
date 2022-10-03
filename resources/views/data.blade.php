<?php
$delivery_types = ['' => 'Не выбрано', '1' => 'Самовывоз', '2' => 'Доставка'];
?>
<div class="card-body order-table"  id="element-to-print">
    <div class="form-group">
        <img src="{{ asset('img/logo.png') }}" alt="" style="margin-bottom: 30px">
    </div>
    <?php if( isset($data['product']) && $data['product'] ): ?>
    <div class="form-group">
        <label for="inputDate">Наименование товара: </label>
        <a href="/product/<?= $data['product']['alias'] ?>" target="_blank"> <?= $data['product']['title'] ?></a>
    </div>
    <?php endif; ?>
    <div class="form-group">
        <label for="inputDate">№ заказа: </label> <?= $data['id'] ?>
    </div>
    <div class="form-group col_2">
        <label for="inputDate">Дата заказа: </label> <?= date('dd.MM.Y H:m:s', $data['date']) ?>
    </div>
    <div class="form-group col_2">
        <label for="inputName">Способ доставки:</label> <?= (array_key_exists($data['delivery'], $delivery_types)) ? $delivery_types[$data['delivery']] : '-' ?>
    </div>
    <div class="form-group col_2">
        <label for="inputName">ФИО:</label> <?= $data['firstname'] ?> <?= $data['lastname'] ?>
    </div>
    <?php if( $data['city'] ): ?>
    <div class="form-group col_2">
        <label for="inputName">Адрес доставки:</label> <?= $data['city'] ?> <?=  $data['address'] ?>
    </div>
    <?php endif; ?>
    <?php if( $data['iin'] ): ?>
    <div class="form-group">
        <label for="inputEmail">ИНН:</label> <?= $data['iin'] ?>
    </div>
    <?php endif; ?>
    <?php if( $data['phone'] ): ?>
    <div class="form-group">
        <label for="inputPhone">Телефон:</label> <a href="tel:+<?= preg_replace('/[^0-9]/', '', $data['phone']) ?> "><?= $data['phone'] ?></a>
    </div>
    <?php endif; ?>

    <?php if( $data['message'] ): ?>
    <div class="form-group">
        <label for="inputName">Комментарий к заказу:</label> <?= $data['message'] ?>
    </div>
    <?php endif; ?>

    <?php if($product): ?>
    <div class="form-group">
        <label for="inputName">Товар:</label> <a href="/products/<?= $product['alias'] ?>"><?= $product['title'] ?></a>
    </div>
    <?php endif; ?>

    <?php if( $data['data'] ): ?>
    <div class="order_info">
            <?= $data['data'] ?>
    </div>
    <?php endif; ?>
    <?php if( $data['senddata'] ): ?>
        <?php
        $json_data = json_decode($data['senddata'], true);
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
