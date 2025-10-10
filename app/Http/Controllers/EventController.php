<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $category = $request->input('category');
        $query = Event::where('is_active', true);
        if ($q) $query->where('title', 'like', "%{$q}%");
        if ($category) $query->where('category', $category);
        return response()->json($query->paginate(10));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return response()->json($event);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'start_at' => 'required|date',
            'quota' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);
        $event = Event::create($data);
        return response()->json($event, 201);
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $data = $request->validate([
            'title' => 'sometimes|string|max:255',
            'start_at' => 'sometimes|date',
            'quota' => 'sometimes|integer|min:0',
        ]);
        $event->update($data);
        return response()->json($event);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return response()->json(['message' => 'Event deleted']);
    }
}
