<?php
    namespace Interfaces;
    
    use Models\Purchase as Purchase;
    use DAO\Connection as Connection;

    interface IPurchaseDAO
    {
        function Add(Purchase $purchase);
        function GetLastPurchaseUser($idUser);
    }
?>