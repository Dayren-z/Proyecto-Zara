<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // USERS MANAGEMENT
    public function indexUsers()
    {
        $users = User::with('role')->get();
        return response()->json($users);
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'role_id' => 'required|exists:roles,id'
        ]);

        $user->role_id = $request->role_id;
        $user->save();

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        
        // Prevent deleting oneself
        if (auth()->id() == $user->id) {
            return response()->json(['message' => 'No puedes eliminar tu propia cuenta mientras estás logueado.'], 403);
        }

        // Extra check for MASTER admin email
        if ($user->email === 'admin@zarahome.com') {
            return response()->json(['message' => 'Seguridad: La cuenta del Administrador Maestro no puede ser eliminada bajo ninguna circunstancia.'], 403);
        }

        $user->delete();
        return response()->json(['message' => 'Usuario eliminado correctamente.']);
    }

    // ROLES MANAGEMENT (READ ONLY)
    public function indexRoles()
    {
        return response()->json(Role::all());
    }

    // ORDERS MANAGEMENT
    public function indexOrders()
    {
        $orders = Order::with(['items.product', 'customer.user'])->orderBy('created_at', 'desc')->get();
        return response()->json($orders);
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,processing,shipped,delivered,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return response()->json(['message' => 'Order status updated', 'order' => $order]);
    }

    public function destroyOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully']);
    }

    // CUSTOMERS MANAGEMENT
    public function indexCustomers()
    {
        $customers = Customer::with('user')->get();
        return response()->json($customers);
    }

    public function updateCustomer(Request $request, $id)
    {
        $request->validate([
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->only(['phone', 'address']));

        return response()->json(['message' => 'Customer updated successfully', 'customer' => $customer]);
    }
}
