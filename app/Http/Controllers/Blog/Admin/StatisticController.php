<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Repositories\Admin\StatisticRepository;
use App\Repositories\Admin\UserRepository;
use Illuminate\Http\Request;

class StatisticController extends AdminBaseController
{
    private $statisticRepository;

    public function __construct()
    {
        parent::__construct();
        $this->statisticRepository = app(StatisticRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpage = 15; //pagination
        //$paginator = $this->statisticRepository->getAllWorkTime($perpage);
        $paginator = app(UserRepository::class)->getAllUsers($perpage);
        $month = $this->statisticRepository->getCurrentMonth();

        $oneUser = $this->statisticRepository;

        \MetaTag::setTags(['title' => 'Timpul lucrat']);
        return view('blog.admin.statistics.index', compact( 'paginator', 'oneUser', 'month'));
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
        $item = $this->statisticRepository->getID($id);

        if (empty($item)){
            abort(404);
        }

        $user_wt = $this->statisticRepository->getOneUser($item->user_id);
        if (!$user_wt){
            abort(404);
        }
        var_dump(count($user_wt));
        die();
        \MetaTag::setTags(['title' => "Timpul lucrat al utlizatorului № {$item->id}"]);

        return view('blog.admin.statistics.edit', compact('item', 'user_wt'));
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
}
