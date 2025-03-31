<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'plan_type' => 'required|string',
            'requirements' => 'required|string',
            'price' => 'required|numeric|min:0'
        ]);

        $validated['userID'] = auth()->id();
        $validated['status'] = 'pending';

        Order::create($validated);

        return redirect()->route('orders.index')
            ->with('success', '¡Orden creada exitosamente!');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,in_route,delivered,cancelled',
            'requirements' => 'required|string'
        ]);

        if ($request->hasFile('delivery_photo')) {
            $path = $request->file('delivery_photo')->store('delivery-photos', 'public');
            $validated['delivery_photo'] = $path;
            $validated['delivered_at'] = now();
        }

        if ($request->hasFile('route_photo')) {
            $path = $request->file('route_photo')->store('route-photos', 'public');
            $validated['route_photo'] = $path;
        }

        if ($validated['status'] === 'cancelled') {
            $validated['cancelled_at'] = now();
        }

        $order->update($validated);

        return redirect()->route('orders.index')
            ->with('success', '¡Orden actualizada exitosamente!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')
            ->with('success', '¡Orden eliminada exitosamente!');
    }

    public function archived()
    {
        $orders = Order::onlyTrashed()->with('user')->latest()->paginate(10);
        return view('orders.archived', compact('orders'));
    }

    public function restore($id)
    {
        $order = Order::withTrashed()->findOrFail($id);
        $order->restore();
        return redirect()->route('orders.archived')
            ->with('success', '¡Orden restaurada exitosamente!');
    }
} 