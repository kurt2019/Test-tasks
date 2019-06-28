<?php
require_once 'configAndQuery/ConfigAndQuery.php';

$db = new ConfigAndQuery;
$orders = $db->getOne();
$sums = $db->getTwo();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>KeyTraff</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="col-md-2 col-md-6 col-md-4">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Главная</a>
                </li>
                <li class="nav-item">
                    <a href="task.html" class="nav-link">Задание</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container-fluid">
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
        <div class="accordion" id="accordionExample">
            <div class="container-fluid">
                <div class="row  mt-5 justify-content-center" id="headingOne">
                    <button type="button" class="btn btn-info btn-lg " data-target="#collapseOne"
                            data-toggle="collapse">
                        <p>First task</p>
                    </button>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                     data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="col-xs-12">
                            <table class="table table-striped table-hover table-bordered">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Номер заказа</th>
                                    <th>Имя товара</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                    <th>Имя оператора</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <tr id="yellow">
                                        <td><?= $order['id']; ?></td>
                                        <td><?= $order['name']; ?></td>
                                        <td><?= $order['price']; ?></td>
                                        <td><?= $order['count']; ?></td>
                                        <td><?= $order['fio']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row  mt-5 justify-content-center" id="headingTwo">
                    <button type="button" class="btn btn-danger  btn-lg" type="button" data-toggle="collapse"
                            data-target="#collapseTwo">
                        <p>Second task</p>
                    </button>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover table-dark">
                                <thead>
                                <tr>
                                    <th>Наименование товара</th>
                                    <th>Количество товара</th>
                                    <th>Общая сумма по товару</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($sums as $sum): ?>
                                    <tr id="blue">
                                        <td><?= $sum['name']; ?></td>
                                        <td><?= $sum['count']; ?></td>
                                        <td><?= $sum['Oll_Sum']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>