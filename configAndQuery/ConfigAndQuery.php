<?php

class ConfigAndQuery
{
    function getOne()
    {
        $db = new PDO("mysql:host=localhost; dbname=testworktrafgid", "root", "");
        $sql = "
            SELECT offers.name, requests.id , requests.price, requests.count, operators.fio
            FROM requests
            INNER JOIN offers ON requests.offer_id = offers.id
            INNER JOIN operators ON requests.operator_id = operators.id
            WHERE requests.count > 2 AND operators.id IN (10, 12)";

        $request = $db->prepare($sql);
        $result = $request->execute();
        $orders = $request->fetchAll(PDO::FETCH_BOTH);

        return $orders;
    }

    function getTwo()
    {
        $db = new PDO("mysql:host=localhost; dbname=testworktrafgid", "root", "");
        $sql = "
            SELECT offers.name, requests.count, SUM(requests.price * requests.count) AS 'Oll_Sum'
            FROM requests, offers
            WHERE requests.offer_id=offers.id
            GROUP BY offers.name";

        $request = $db->prepare($sql);
        $result = $request->execute();
        $sum = $request->fetchAll(PDO::FETCH_BOTH);

        return $sum;
    }
}