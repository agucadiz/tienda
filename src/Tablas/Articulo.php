<?php

namespace App\Tablas;

use PDO;

class Articulo extends Modelo
{
    protected static string $tabla = 'articulos';

    public $id;
    private $codigo;
    private $descripcion;
    private $precio;
    private $stock;

    public function __construct(array $campos)
    {
        $this->id = $campos['id'];
        $this->codigo = $campos['codigo'];
        $this->descripcion = $campos['descripcion'];
        $this->precio = $campos['precio'];
        $this->stock = $campos['stock'];
    }

    public static function existe(int $id, ?PDO $pdo = null): bool
    {
        return static::obtener($id, $pdo) !== null;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public static function insertar($codigo, $descripcion, $precio, $stock, ?PDO $pdo = null)
    {
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare('INSERT INTO articulos (codigo, descripcion, precio, stock)
                                    VALUES (:codigo, :descripcion, :precio, :stock)');
        $sent->execute([':codigo' => $codigo, ':descripcion' => $descripcion, ':precio' => $precio, ':stock' => $stock]);
    }

    public static function modificar($id, $descripcion, $precio, $stock, ?PDO $pdo = null)
    {
        $pdo = $pdo ?? conectar();

        $sent = $pdo->prepare("UPDATE articulos
                                  SET descripcion = :descripcion, precio = :precio, stock = :stock
                                WHERE id = :id");
        $sent->execute([':id' => $id, ':descripcion' => $descripcion, ':precio' => $precio, ':stock' => $stock]);
    }
}
