<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\RequestRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MetaTag;
class MainController extends AdminBaseController
{
    private $requestRepository;

    public function __construct()
    {
        parent::__construct();
        $this->requestRepository = app(RequestRepository::class);
    }

    public function index()
    {
        $countUsers = MainRepository::getCountUsers();
        $countPositions = MainRepository::getCountPositions();
        $countRequests = MainRepository::getCountRequests();

        //pagination
        $perpage = 4;

        $last_requests = $this->requestRepository->getAllRequests($perpage);

        MetaTag::setTags(['title' => 'Admin panel']);
        return view('blog.admin.main.index', compact('countUsers', 'countPositions', 'countRequests', 'last_requests'));
    }
}
