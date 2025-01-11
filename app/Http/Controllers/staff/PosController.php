<?php

namespace App\Http\Controllers\staff;

use App\Models\Order;
use App\Models\Product;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class PosController extends Controller
{
    public function showPos (Request $request)
    {
        $category = $request->get('category', 'ALL');
        $products = $category === 'ALL' ? Product::all() : Product::where('category', $category)->get();
        return view('pages.Pos', compact('products', 'category'));
    }

    public function store(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request)
    {
        $itemId = $request->id;
        $action = $request->action;
    
        $cartItem = Cart::get($itemId);
    
        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Item not found in cart.'], 404);
        }
    
        // Update quantity based on action
        if ($action === 'increase') {
            Cart::update($itemId, ['quantity' => 1]);
        } elseif ($action === 'decrease') {
            if ($cartItem->quantity > 1) {
                Cart::update($itemId, ['quantity' => -1]);
            } else {
                Cart::remove($itemId);
            }
        }
   
        $subtotal = Cart::getSubTotal();
        $discount = session('discount_amount', 0); 
        $total = $subtotal - $discount;
    
     
        session(['cart_total' => $total]);
    
        $updatedItem = Cart::get($itemId); 
    
        return response()->json([
            'success' => true,
            'quantity' => $updatedItem ? $updatedItem->quantity : 0,
            'totalPrice' => $updatedItem ? $updatedItem->price * $updatedItem->quantity : 0,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'total' => $total,
        ]);
    }
    
    

    public function applyDiscount(Request $request)
    {
        // Validate input
        $request->validate([
            'discount_value' => 'required|numeric|min:0',
            'discount_type' => 'required|in:fix,percent',  
        ]);

        $discountValue = $request->discount_value;
        $discountType = $request->discount_type;

  
        $total = Cart::getTotal();

        $discountAmount = 0;

        if ($discountType == 'fix') {
            $discountAmount = $discountValue;  
            $total -= $discountValue;  
        } elseif ($discountType == 'percent') {
            $discountAmount = ($total * ($discountValue / 100));  
            $total -= $discountAmount; 
        }

        $total = max(0, $total);


        session()->put('discount_amount', $discountAmount);
        session()->put('cart_total', $total);

        return back()->with('discount_applied', true);
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'notes' => 'nullable|string|max:1000',
            'amount_received' => 'required|numeric|min:0',
        ]);
    
        $total = session('cart_total') ?? Cart::getTotal();
        $amountReceived = $request->amount_received;
    
        if ($amountReceived < $total) {
            return redirect()->back()->withErrors(['amount_received' => 'Received amount is less than the payable amount.']);
        }
    
        $change = $amountReceived - $total;
        $orderNumber = mt_rand(10000000, 99999999);
    
        $order = Order::create([
            'order_number' => $orderNumber,
            'customer_name' => $request->customer_name,
            'notes' => $request->notes,
            'subtotal' => Cart::getSubTotal(),
            'total' => $total,
            'payment_method' => 'Cash',
        ]);
    
        foreach (Cart::getContent() as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
            ]);
        }
    
        Cart::clear();
        session()->forget(['cart_total', 'discount_amount']);
    
        return redirect()->route('staff.pos')->with('success', "Order placed successfully! Change: ₱" . number_format($change, 2));
    }
    
    

}
