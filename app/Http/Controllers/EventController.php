<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class EventController extends Controller
{
    /**
     * Display the organizer's dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $events = Event::all();
        return view("organisateur.organisateur", compact('events'));
    }

    /**
     * Store a newly created event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'descriptions' => 'required',
            'dateStart' => 'required',
            'timeStart' => 'required',
            'dateEnd' => 'required',
            'timeEnd' => 'required',
            'locations'=> 'required',
            'price'=> 'required',
        ]);
        $userId = null;

    // Ensure the user is authenticated
    if (Auth::check()) {
        $userId = Auth::id();
    } else {
        // Handle unauthenticated user
        // For example, you might want to redirect them to the login page
        return redirect()->route('login')->with('error', 'Please log in to create events');
    }
        Event::create([
            "user_id" => $userId,
            "name" => $request->name,
            "descriptions" => $request->descriptions,
            "dateStart" => $request->dateStart,
            "timeStart" => $request->timeStart,
            "dateEnd" => $request->dateEnd,
            "timeEnd" => $request->timeEnd,
            'locations'=> $request->locations,
            'price'=> $request->price,
        ]);

        return back()->with('success', 'Event created successfully!');
    }
    public function update(Request $request, Event $event)
    {

        $user_id = Auth()->id();
        $data = [
            'user_id' => $user_id,
            'name' => $request->name,
            'descriptions' => $request->descriptions,
            'dateStart' => $request->dateStart,
            'dateEnd' => $request->dateEnd,
            'timeStart' => $request->timeStart,
            'timeEnd' => $request->timeEnd,
            'locations' => $request->locations,
            'price' => $request->price,
        ];

        $event->update($data);

        return redirect()->route('event.index');
    }

    /**
     * Remove the specified event from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Ensure the user owns the event
        if ($event->user_id != Auth::id()) {
            return back()->with('error', 'You are not authorized to delete this event');
        }

        $event->delete();

        return back()->with('success', 'Event deleted successfully!');
    }

    /**
     * Get the events for display in the calendar.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Event $event)
    {

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
        // dd($eventId);
        if (!Auth::check()) {
            // Handle unauthenticated user (e.g., redirect to login page)
            return redirect()->route('register');
        }

        $user = Auth::user();
        if (!$user->events()->where('calendar_id', $eventId)->exists()) {
            // return back()->with('error', 'You have already bought this event.');
            $user->events()->attach($eventId);
        }




        Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'mad',
                        'product_data' => [
                            "name" => $request->name,
                            "description" => $request->description
                        ],
                        'unit_amount'  => $request->price . '00', // amount should be in cents
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment', // the mode  of payment
            'success_url' => route('success'), // route when success 
            'cancel_url'  => route('dashboard'), // route when  failed or canceled
        ]);

        return redirect()->away($session->url);
    }
}
