<?php


namespace App\Models;

use PDO;
class Product extends \Core\Model
{

    public static function getAll(){

        try {
            $dbConnection = static::getDB();

            $statement = $dbConnection->query('SELECT * FROM products');
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);


            return $result;

        } catch
        (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public static function getOne($id){

        try {
            $dbConnection = static::getDB();


            $statement =  $dbConnection->prepare(
                '
                        SELECT * FROM products WHERE id=:id
');
            $statement->execute(array(
                "id" => $id
            ));
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);


            return $result;

        } catch
        (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function update($id, $part_number, $imageURL, $stock_quantity, $cost_price, $selling_price, $vat_rate, $description){

        try {
            $dbConnection = static::getDB();

            $statement =  $dbConnection->prepare("UPDATE `products` SET `part_number` = :part_number,
 `description` = :description, `image` = :image, `stock_quantity` = :stock_quantity, `cost_price` = :cost_price,
  `selling_price` = :selling_price, `vat_rate` = :vat_rate WHERE `products`.`id` = :id");


            $statement->execute(array(
                "part_number" => $part_number ,
                "image" => $imageURL,
                "stock_quantity" => $stock_quantity,
                "cost_price" => $cost_price,
                "selling_price" => $selling_price,
                "vat_rate" => $vat_rate,
                "description" => $description,
                "id" => $id
            ));
            return true;
        } catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }


    public static function delete($id){
        $dbConnection = static::getDB();

        $statement =  $dbConnection->prepare(
            '
                        DELETE FROM products WHERE id=:id
');
        $statement->execute(array(
            "id" => $id
        ));
        return true;

    }

    public static function insert($part_number, $imageURL, $stock_quantity, $cost_price, $selling_price, $vat_rate, $description){

        try {
            $dbConnection = static::getDB();

            $statement =  $dbConnection->prepare('
INSERT INTO `products` (`id`, `part_number`, `description`, `image`, `stock_quantity`, `cost_price`, `selling_price`, `vat_rate`) 
VALUES (NULL, :part_number, :description, :image, :stock_quantity, :cost_price, :selling_price, :vat_rate)
');




//
//INSERT INTO `products` (`id`, `part_number`,`description`, `image`, `stock_quantity`, `cost_price`, `selling_price`, `vat_rate`) 
// VALUES (NULL, :part_number, :description, :image, :stock_quantity, :cost_price, :selling_price, :vat_rate) 
// ');

//
//            INSERT INTO `entries` (`id`, `title`, `entry_text`, `ownerId`)
//                        VALUES (NULL, :title, :entry_text, :ownerId)

            $statement->execute(array(
                "part_number" => $part_number ,
                "image" => $imageURL,
                "stock_quantity" => $stock_quantity,
                "cost_price" => $cost_price,
                "selling_price" => $selling_price,
                "vat_rate" => $vat_rate,
                "description" => $description,
            ));
            return true;
        } catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }

}