<?php

namespace App\Http\Controllers\Blog\User;

use App\Repositories\Admin\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MetaTag;
use App\Models\Admin\Statistic;

class MainController extends Controller
{
    /**
     * MainController constructor.
     * Verifies if user exists(is registered)
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $requestTypes = app(UserRepository::class)->getRequestTypes();

        MetaTag::setTags(['title' => 'Utilizator']);
        return view('blog.user.index', compact('requestTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Returns the calendar view
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function calendar ()
    {
        return view('calendar.index');
    }


    /**
     * Shows the user's work time
     *
     * @return false|int|string
     */
    public function  fetchEvents ()
    {
        $ret = [];
        $data = Statistic::where('user_id', \Auth::user()->id)->get()->toArray();
        if (!empty($data)) {
            foreach ($data as $item) {
                $ret[] = ['id' => $item['id'], 'title' => $item['worktime'], 'start' => $item['date'], 'end' => $item['date']];
            }
        }
        return json_encode($ret);
    }

    /**
     * Adds or updates user's work time data
     *
     * @param Request $request
     * @return bool|string
     */
    public function  addEvent (Request $request)
    {
        if (empty($request)) return false;
        $time = $request->title;
        if (!empty($time)) {

            $isset = Statistic::where(['date' => date('Y-m-d', strtotime($request->start))])->first();
            if (!empty($isset->id)) {
                $isset->worktime = $time;
                $isset->save();
                return 'edited';
            }

            $statistic = new Statistic();
            $statistic->user_id = \Auth::user()->id;
            $statistic->worktime = $time;
            $statistic->date = $request->start;
            $statistic->save();
            return '';
        }
    }

    /**
     * Removes the user's work time data
     *
     * @param Request $request
     * @return bool
     */
    public function  removeEvent (Request $request)
    {
        if (empty($request)) return false;
        if (!empty($request->id)) {
            return Statistic::where('id', $request->id)->delete();
        }
    }

    public function addRequestToAdmin(Request $request)
    {
        $request = app(\App\Models\Admin\Request::class)::create([
            'user_id'    => \Auth::user()->id,
            'type_id'    => $request['reqType'],
            'message'    => $request['reqMessage'],
        ]);

        if (!$request) {
            return back()
                ->withErrors(['msg' => 'Eroare la adăugarea cererii!'])
                ->withInput();
        } else {
            return redirect()
                ->route('user.index')
                ->with(['success' => 'Cerera a fost adăugată cu succes!']);
        }
    }
}
