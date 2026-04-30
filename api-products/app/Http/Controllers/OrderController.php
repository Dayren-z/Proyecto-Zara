<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        
        $customer = Customer::where('user_id', $user->id)->first();
        
        if (!$customer) {
            return response()->json([]);
        }

        $orders = Order::with('items.product')->where('customer_id', $customer->id)->orderBy('created_at', 'desc')->get();
        
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cart' => 'required|array',
            'cart.*.id' => 'required|integer',
            'cart.*.quantity' => 'required|integer|min:1',
            'cart.*.price' => 'required|numeric'
        ]);

        $user = auth()->user();

        try {
            DB::beginTransaction();

            // Buscar o crear Customer para este usuario
            $customer = Customer::firstOrCreate(
                ['user_id' => $user->id],
                ['phone' => null, 'address' => null]
            );

            // Calcular el total a partir del carrito validado
            $total = 0;
            foreach ($request->cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            // Crear el pedido
            $order = Order::create([
                'customer_id' => $customer->id,
                'total' => $total,
                'status' => 'pending'
            ]);

            // Crear los items del pedido
            foreach ($request->cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => '¡Pedido realizado con éxito!',
                'order_id' => $order->id
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error al procesar el pedido',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function cancel($id)
    {
        $user = auth()->user();
        $customer = Customer::where('user_id', $user->id)->first();

        if (!$customer) {
            return response()->json(['message' => 'No customer found'], 404);
        }

        $order = Order::where('id', $id)->where('customer_id', $customer->id)->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found or unauthorized'], 404);
        }

        if (!in_array($order->status, ['pending', 'processing'])) {
            return response()->json(['message' => 'Only pending or processing orders can be cancelled'], 400);
        }

        $order->status = 'cancelled';
        $order->save();

        return response()->json([
            'message' => 'Pedido cancelado con éxito',
            'order' => $order
        ]);
    }
}
