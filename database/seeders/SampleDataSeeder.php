<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Categories (Exactly 5)
        $categories = [
            ['name' => 'Cuerdas', 'description' => 'Guitarras y bajos', 'is_active' => true],
            ['name' => 'Percusión', 'description' => 'Baterías y cajas', 'is_active' => true],
            ['name' => 'Audio', 'description' => 'Parlantes e interfaces', 'is_active' => true],
            ['name' => 'Viento', 'description' => 'Flautas y saxos', 'is_active' => true],
            ['name' => 'Teclados', 'description' => 'Pianos y sintes', 'is_active' => true],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // 2. Clients (Exactly 5)
        $clients_data = [
            ['first_name' => 'Juan', 'last_name' => 'Pérez', 'email' => 'juan@test.com', 'phone' => '111', 'address' => 'Dir 1', 'city' => 'Lima', 'document_id' => '111', 'is_active' => true],
            ['first_name' => 'María', 'last_name' => 'García', 'email' => 'maria@test.com', 'phone' => '222', 'address' => 'Dir 2', 'city' => 'Arequipa', 'document_id' => '222', 'is_active' => true],
            ['first_name' => 'Carlos', 'last_name' => 'López', 'email' => 'carlos@test.com', 'phone' => '333', 'address' => 'Dir 3', 'city' => 'Trujillo', 'document_id' => '333', 'is_active' => true],
            ['first_name' => 'Ana', 'last_name' => 'Torres', 'email' => 'ana@test.com', 'phone' => '444', 'address' => 'Dir 4', 'city' => 'Cusco', 'document_id' => '444', 'is_active' => true],
            ['first_name' => 'Luis', 'last_name' => 'Sánchez', 'email' => 'luis@test.com', 'phone' => '555', 'address' => 'Dir 5', 'city' => 'Piura', 'document_id' => '555', 'is_active' => true],
        ];

        foreach ($clients_data as $client) {
            Client::create($client);
        }

        // 3. Products (Exactly 5, one for each category)
        $products = [
            ['name' => 'Guitarra Fender', 'category_id' => 1, 'description' => 'Desc 1', 'sku' => 'SKU1', 'stock' => 10, 'price' => 1000, 'is_active' => true],
            ['name' => 'Batería Pearl', 'category_id' => 2, 'description' => 'Desc 2', 'sku' => 'SKU2', 'stock' => 5, 'price' => 2000, 'is_active' => true],
            ['name' => 'Interfaz Focusrite', 'category_id' => 3, 'description' => 'Desc 3', 'sku' => 'SKU3', 'stock' => 20, 'price' => 200, 'is_active' => true],
            ['name' => 'Saxofón Alto', 'category_id' => 4, 'description' => 'Desc 4', 'sku' => 'SKU4', 'stock' => 3, 'price' => 800, 'is_active' => true],
            ['name' => 'Teclado Yamaha', 'category_id' => 5, 'description' => 'Desc 5', 'sku' => 'SKU5', 'stock' => 15, 'price' => 500, 'is_active' => true],
        ];

        foreach ($products as $prod) {
            Product::create($prod);
        }

        // 4. Orders (Exactly 5, one for each client)
        $orders_data = [
            ['client_id' => 1, 'order_date' => Carbon::now(), 'total_amount' => 1000, 'status' => 'Pagado', 'payment_method' => 'Tarjeta', 'shipping_address' => 'Dir 1'],
            ['client_id' => 2, 'order_date' => Carbon::now(), 'total_amount' => 2000, 'status' => 'Pagado', 'payment_method' => 'Transferencia', 'shipping_address' => 'Dir 2'],
            ['client_id' => 3, 'order_date' => Carbon::now(), 'total_amount' => 200, 'status' => 'Pagado', 'payment_method' => 'Yape', 'shipping_address' => 'Dir 3'],
            ['client_id' => 4, 'order_date' => Carbon::now(), 'total_amount' => 800, 'status' => 'Pagado', 'payment_method' => 'Efectivo', 'shipping_address' => 'Dir 4'],
            ['client_id' => 5, 'order_date' => Carbon::now(), 'total_amount' => 500, 'status' => 'Pagado', 'payment_method' => 'Débito', 'shipping_address' => 'Dir 5'],
        ];

        foreach ($orders_data as $order) {
            Order::create($order);
        }
    }
}
