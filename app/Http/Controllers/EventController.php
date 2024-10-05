<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display the organizer's dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {   
        $this->deleteExpiredEvents();
        // Check if the authenticated user is the seeder user
        if (Auth::check() && Auth::user()->email === 'test@example.com') {
            $events = Event::all();
            return view('organisateur.organisateur');  // Adjust the view path accordingly
        }

        // If the user is not the seeder user, redirect to the dashboard
        return redirect('/dashboard')->with('error', 'Unauthorized access to event page');
    }
    private function deleteExpiredEvents()
    {
        // Get the current date and time
        $now = Carbon::now();

        // Delete all events where the end date and time have passed
        Event::where('dateEnd', '<', $now->toDateString())
            ->orWhere(function ($query) use ($now) {
                $query->where('dateEnd', '=', $now->toDateString())
                      ->where('timeEnd', '<', $now->toTimeString());
            })
            ->delete();
    }
    /**
     * Store a newly created event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'descriptions' => 'required|string',
            'dateStart' => 'required|date',
            'dateEnd' => 'required|date',
            'timeStart' => 'required',
            'timeEnd' => 'required',
            'locations' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

        // Handle image upload if image is present
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('images/events', $imageName, 'public'); // Save image in public disk
        }

        // Create a new event and associate with the authenticated user
        Event::create([
            'user_id' => Auth::id(), // Make sure the user is authenticated
            'name' => $validatedData['name'],
            'descriptions' => $validatedData['descriptions'],
            'dateStart' => $validatedData['dateStart'],
            'dateEnd' => $validatedData['dateEnd'],
            'timeStart' => $validatedData['timeStart'],
            'timeEnd' => $validatedData['timeEnd'],
            'locations' => $validatedData['locations'],
            'price' => $validatedData['price'],
            'image' => $imagePath, // Store image path in the DB
        ]);

        return redirect()->route('event.index')->with('success', 'Event created successfully.');
    }
    public function fetch()
    {
        // Fetch all events
        $events = Event::all();

        // Format the data for FullCalendar
        $formattedEvents = $events->map(function($event) {
            return [
                'title' => $event->name,
                'start' => $event->dateStart . 'T' . $event->timeStart,
                'end' => $event->dateEnd . 'T' . $event->timeEnd
            ];
        });

        // Return as JSON for FullCalendar
        return response()->json($formattedEvents);
    }


        

    /**
     * Remove the specified event from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        // Check if the event exists and if the authenticated user is the owner
        if ($event && $event->user_id === auth()->id()) {
            $event->delete();
            return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
        }

        return redirect()->route('events.index')->with('error', 'Event not found or you do not have permission to delete this event.');
    }

    public function edit($id)
    {   
        $this->deleteExpiredEvents();
        $event = Event::findOrFail($id);
        return response()->json($event); // Send event data to the frontend to populate the modal
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'descriptions' => 'required|string',
            'dateStart' => 'required|date',
            'timeStart' => 'required|string',
            'dateEnd' => 'required|date',
            'timeEnd' => 'required|string',
            'locations' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional
        ]);
    
        // Find the event by ID
        $event = Event::findOrFail($id);
    
        // Check if the authenticated user is the owner of the event
        if ($event->user_id !== auth()->id()) {
            return redirect()->route('events.index')->with('error', 'You do not have permission to update this event.');
        }
    
        // Update the event fields
        $event->name = $request->input('name');
        $event->descriptions = $request->input('descriptions');
        $event->dateStart = $request->input('dateStart');
        $event->timeStart = $request->input('timeStart');
        $event->dateEnd = $request->input('dateEnd');
        $event->timeEnd = $request->input('timeEnd');
        $event->locations = $request->input('locations');
        $event->price = $request->input('price');
    
        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($event->image) {
                Storage::delete('public/'.$event->image);
            }
    
            // Store the new image and save the path
            $imagePath = $request->file('image')->store('events', 'public');
            $event->image = $imagePath;
        }
    
        // Save the event
        $event->save();
    
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }
    

    /**
     * Get the events for display in the calendar.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Event $event)
    {

        $this->deleteExpiredEvents();
        // return view('calender', compact('calender'));

        $events = Event::all()->map(function (Event $e) {

            $start = $e->dateStart . " " . $e->timeStart;
            $end = $e->dateEnd . " " . $e->timeEnd;

            return [
                "start" => $start,
                "end" => $end,
                "title" => $e->name,
                "color" => "#FF5733", // Set the color of the event
                "textColor" => "#FFFFFF", // Set the text color of the event
                // "color" => "#000", 
            ];
        });
        return response()->json([
            'events' => $events,
        ]);
    }

    public function session(Request $request, $eventId)
    {
        if (!Auth::check()) {
            return redirect()->route('register');
        }

        $user = Auth::user();

        if (!$user->events()->where('events.id', $eventId)->exists()) {
            $user->events()->attach($eventId);
        }

        // Set the Stripe API key from environment file
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'mad',
                        'product_data' => [
                            'name' => $request->name,
                            'description' => $request->description,
                        ],
                        'unit_amount' => $request->price * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('dashboard'),
        ]);

        return redirect()->away($session->url);
    }




}
