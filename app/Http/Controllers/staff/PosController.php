<?php

namespace App\Http\Controllers\staff;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            return back()->withErrors(['error' => 'Item not found in cart.']);
        }


        if ($action === 'increase') {
            Cart::update($itemId, ['quantity' => 1]); 
        } elseif ($action === 'decrease') {
            if ($cartItem->quantity > 1) {
                Cart::update($itemId, ['quantity' => -1]); 
            } else {
                Cart::remove($itemId); 
            }
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function applyDiscount(Request $request)
    {
        // Validate input
        $request->validate([
            'discount_value' => 'required|numeric|min:0',
            'discount_type' => 'required|in:fix,percent',  // Accept only "fix" or "percent"
        ]);

        $discountValue = $request->discount_value;
        $discountType = $request->discount_type;

        // Get the current total of the cart
        $total = Cart::getTotal();

        $discountAmount = 0;

        // Apply the discount based on type (fixed or percentage)
        if ($discountType == 'fix') {
            $discountAmount = $discountValue;  // Fixed discount
            $total -= $discountValue;  // Subtract the fixed discount
        } elseif ($discountType == 'percent') {
            $discountAmount = ($total * ($discountValue / 100));  // Percentage discount
            $total -= $discountAmount;  // Subtract the percentage discount
        }

        // Ensure the total doesn't go below zero
        $total = max(0, $total);

        // Store the discount amount and updated total in session
        session()->put('discount_amount', $discountAmount);
        session()->put('cart_total', $total);

        // Redirect back to the cart page with the updated total and discount
        return back()->with('discount_applied', true);
    }

}
