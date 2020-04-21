<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\RequestRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends AdminBaseController
{
    private $requestRepository;

    public function __construct()
    {
        parent::__construct();
        $this->requestRepository = app(RequestRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpage = 15; //pagination
        $countRequests = MainRepository::getCountRequests();
        $paginator = $this->requestRepository->getAllRequests($perpage);
        \MetaTag::setTags(['title' => 'Toate cererile']);
        return view('blog.admin.request.index', compact('countRequests', 'paginator'));
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
        $item = $this->requestRepository->getID($id);
        if (empty($item)){
            abort(404);
        }

        $request = $this->requestRepository->getOneRequest($item->id);
        if (!$request){
            abort(404);
        }

        \MetaTag::setTags(['title' => "Cererea № {$item->id}"]);

        return view('blog.admin.request.edit', compact('item', 'request'));
    }


    /**
     * Change status of the request by id
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function change($id)
    {
        $result = $this->requestRepository->changeStatusOrder($id);
        if ($result) {
            return redirect()
                ->route('blog.admin.requests.edit', $id)
                ->with(['success' => "Salvat cu succes!"]);
        } else {
            return back()
                ->withErrors(['msg' => "Salvare eșuată!"]);
        }
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
        $st = $this->requestRepository->changeStatusOnDelete($id);
        if ($st) {
            $result = \App\Models\Admin\Request::destroy($id);
            if ($result) {
                return  redirect()
                    ->route('blog.admin.requests.index')
                    ->with(['success' => "Cererea № $id a fost eliminată!"]);
            } else {
                return back()->withErrors(['msg' => 'Ștergere eșuată!']);
            }
        } else {
            return back()->withErrors(['msg' => 'Statutul nu s-a schimbat!']);
        }
    }

    /**
     * Remove the request from database by id
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function force_destroy($id)
    {
        if (empty($id)){
            return back()->withErrors(['msg' => 'Înregistrarea nu a fost găsită!']);
        }
        $result = \DB::table('requests')
            ->delete($id);

        if ($result) {
            return  redirect()
                ->route('blog.admin.requests.index')
                ->with(['success' => "Cererea № $id a fost eliminată!"]);
        } else {
            return back()->withErrors(['msg' => 'Ștergere eșuată!']);
        }
    }
}
