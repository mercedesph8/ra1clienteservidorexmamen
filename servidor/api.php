<?php

header('Access-Control-Allow-Origin: *');

$productos = [
    //inserto dos nuevos campos en los poductos y 6 nuevos productos
    [
        "id" => 1,
        "nombre" => "Camiseta básica",
        "descripcion" => "Camiseta de algodón 100% en varios colores.",
        "precio" => 12.99,
        "categoria" => "Camisetas",
        "img" => "https://susisweetdress.com/18252-large_default/camiseta-basica-susisweetdress-blanca.jpg"
    ],
    [
        "id" => 2,
        "nombre" => "Pantalón vaquero",
        "descripcion" => "Pantalón de mezclilla azul clásico.",
        "precio" => 29.95,
        "categoria" => "Pantalones",
        "img" => "https://m.media-amazon.com/images/I/71wPkHR1S7L._UY1000_.jpg"

    ],
    [
        "id" => 3,
        "nombre" => "Zapatillas deportivas",
        "descripcion" => "Zapatillas ligeras y cómodas para el día a día.",
        "precio" => 45.50,
        "categoria" => "Calzado",
        "img" => "https://www.paredes.es/14180-home_default/zapatillas-deportivas-para-mujer-catarroja-rosa.jpg"

    ],
    [
        "id" => 4,
        "nombre" => "Camisa de rayas",
        "descripcion" => "Camisa de rayas para ocasiones formales.",
        "precio" => 45.50,
        "categoria" => "Camisas",
        "img" => "https://media.revistavanityfair.es/photos/65e87daf01ce7e5a5ae7ffcc/master/w_1600%2Cc_limit/GettyImages-1489068055.jpg"

    ],
    [
        "id" => 5,
        "nombre" => "Botas estilo ugg",
        "descripcion" => "Botas cómodas y cálidas para el invierno.",
        "precio" => 45.50,
        "categoria" => "Calzado",
        "img" => "https://images.snowleader.com/media/catalog/product/cache/1/image/0dc2d03fe217f8c83829496872af24a0/U/G/UGG_00158_01.jpg"

    ],
    [
        "id" => 6,
        "nombre" => "Pantalones de oficina",
        "descripcion" => "Pantalones elegantes para el trabajo.",
        "precio" => 45.50,
        "categoria" => "Pantalones",
        "img" => "https://s1.ppllstatics.com/mujerhoy/www/multimedia/202408/07/media/cortadas/pantalones-vestir-4-pinza-k3hF--650x900@MujerHoy.jpg"

    ],
    [
        "id" => 7,
        "nombre" => "Blazer oversize",
        "descripcion" => "Blazer de corte oversize para un look moderno.",
        "precio" => 45.50,
        "categoria" => "Chaquetas",
        "img" => "https://media.glamour.mx/photos/64480e51f241b04ccc46f6ab/1:1/w_2048,h_2048,c_limit/blazer_oversize_para_mujeres_bajitas.jpg"

    ],
    [
        "id" => 8,
        "nombre" => "Bomber de cuero",
        "descripcion" => "Chaqueta bomber de cuero auténtico.",
        "precio" => 150.50,
        "categoria" => "Chaquetas",
        "img" => "https://b2c-media.intrend.it/sys-master/m0/DT/2025/2/1446065105/009/s3details/1446065105009-e-1hiltex-giacca-in-pelle_normal.jpg"

    ],
    [
        "id" => 9,
        "nombre" => "Cinturón hebilla metálica",
        "descripcion" => "Cinturón de cuero con hebilla metálica.",
        "precio" => 45.50,
        "categoria" => "Accesorios",
        "img" => "https://assets.ullapopken.de/images/products/839374130_model_g_01.jpg"

    ],
];

if (isset($_GET['id'])) {
    header('Content-Type: application/json');
    $id = intval($_GET['id']);
    foreach ($productos as $p) {
        if ($p['id'] === $id) {
            echo json_encode($p);
            exit;
        }
    }
    echo json_encode(["error" => "Producto no encontrado"]);
 }else if (isset($_GET['modo']) && $_GET['modo'] === 'texto') {
    header('Content-Type: text/html; charset=UTF-8');
    mostrarProductosJSON($productos);
} //Pista debes detectar el max con  el get para el ejercicio--> Ejercicio 4: Filtrado de productos por GET
else {
    echo json_encode($productos);
}


///Función que muestra por pantalla un listado de productos.
//http://localhost/ra1clienteservidorexmamen/servidor/api.php?modo=texto
function mostrarProductosJSON($productos) {
    echo "--- Lista de productos ---<br>";
    $json = json_encode($productos);
    $array = json_decode($json, true);
    //Crear un foreach para recorrerlo  y pintar por pantalla, el id, nombre y precio del producto
    foreach ($array as $producto) {
        echo "ID: " . $producto['id'];
        echo "<br>";

        echo "Nombre: " . $producto['nombre'];
        echo "<br>";

        echo "Precio: " . $producto['precio'];
        echo "<br><br>";
    }
}
