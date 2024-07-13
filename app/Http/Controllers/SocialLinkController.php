<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function get() {
        $links = SocialLink::all();

        return response()->json($links);
    }

    public function store(Request $request) {
        // Validate the request
        $validatedData = $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'icon' => 'required|string|max:255',
        ]);

        // Create a new SocialLink instance
        $link = new SocialLink();
        $link->platform = $validatedData['platform'];
        $link->url = $validatedData['url'];
        $link->icon = $validatedData['icon'];
        // Set the order to the highest current order + 1
        $link->order = SocialLink::max('order') + 1;
        $link->save();

        return response()->json($link);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'icon' => 'required|string|max:255',
            'order' => 'required|integer',
        ]);

        $link = SocialLink::findOrFail($id);
        $link->platform = $validatedData['platform'];
        $link->url = $validatedData['url'];
        $link->icon = $validatedData['icon'];
        $link->order = $validatedData['order'];
        $link->save();

        return response()->json($link);
    }

    public function destroy($id) {
        $link = SocialLink::findOrFail($id);
        $link->delete();

        return response()->json($link);
    }

    public function updateOrder(Request $request) {
        $orderData = $request->input('order');

        foreach ($orderData as $data) {
            $link = SocialLink::find($data['id']);
            if ($link) {
                $link->order = $data['order'];
                $link->save();
            }
        }

        return response()->json(['status' => 'success']);
    }

}
