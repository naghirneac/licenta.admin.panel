<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\AdminUserEditRequest;
use App\Models\Admin\User;
use App\Models\UserPosition;
use App\Models\UserRole;
use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\PositionRepository;
use App\Repositories\Admin\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MetaTag;

class UserController extends AdminBaseController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = app(UserRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpage = 15;
        $countUsers = MainRepository::getCountUsers();
        $paginator = $this->userRepository->getAllUsers($perpage);

        MetaTag::setTags(['title' => 'Lista de utilizatori']);
        return view('blog.admin.user.index', compact('countUsers', 'paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = app(PositionRepository::class)->getAllPositions(20);

        MetaTag::setTags(['title' => 'Adăugare utilizator']);
        return view('blog.admin.user.add', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserEditRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'idnp' => $request['idnp'],
            'email' => $request['email'],
            'birth_date' => $request['birth_date'],
            'enrolment_date' => $request['enrolment_date'],
            'password' => bcrypt($request['password']),
        ]);

        if (!$user) {
            return back()
                ->withErrors(['msg' => 'Eroare la creare'])
                ->withInput();
        } else {
            $role = UserRole::create([
                'user_id' => $user->id,
                'role_id' => (int)$request['role'],
            ]);

            $position = UserPosition::create([
                'user_id' => $user->id,
                'position_id' => (int)$request['position'],
            ]);

            if (!$role || !$position) {
                return back()
                    ->withErrors(['msg' => 'Eroare la creare'])
                    ->withInput();
            } else {
                return redirect()
                    ->route('blog.admin.users.index')
                    ->with(['success' => 'Salvat cu succes!']);
            }
        }
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
        $perpage = 15;
        $item = $this->userRepository->getID($id);
        if (empty($item)) {
            abort(404);
        }

        $requests = $this->userRepository->getUserRequests($id, $perpage);
        $role = $this->userRepository->getUserRole($id);
        $position = $this->userRepository->getUserPosition($id);
        $count = $this->userRepository->getCountRequestsPag($id);
        $countRequests = $this->userRepository->getCountRequests($id, $perpage);
        $allPositions = app(PositionRepository::class)->getAllPositions(20);

        if (count($position) > 1){
            $firstPosition = $position[0];
            $secondPosition = $position[1];
        } else {
            $firstPosition = $position[0]->position_id;
            $secondPosition = null;
        }

        MetaTag::setTags(['title' => "Editarea utilizatorului № {$item->id}"]);
        return view('blog.admin.user.edit', compact('item', 'requests', 'role', 'count', 'countRequests',
            'allPositions', 'firstPosition', 'secondPosition'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param AdminUserEditRequest $request
     * @param User $user
     * @param UserRole $role
     */
    public function update(AdminUserEditRequest $request, User $user, UserRole $role, UserPosition $position)
    {
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->birth_date = $request['birth_date'];
        $user->enrolment_date = $request['enrolment_date'];

        $request['password'] == null ?: $user->password = bcrypt($request['password']);
        $save = $user->save();
        if (!$save) {
            return back()
                ->withErrors(['msg' => 'Eroare la salvare'])
                ->withInput();
        } else {
//            var_dump($position->where('user_id', $user->id)->where('position_id', '<>', (int)$request['position'])->first());
//            die();
            $role->where('user_id', $user->id)->update(['role_id' => (int)$request['role']]);
            $position->where('user_id', (int)$user->id)->limit(1)->update(['position_id' => (int)$request['position']]);
            if ($position->where('user_id', $user->id)->where('position_id', '<>', (int)$request['position'])->limit(1)){
                $position->where('user_id', $user->id)->where('position_id', '<>', (int)$request['position'])->limit(1)
                    ->update(['position_id' => (int)$request['extraPosition']]);
            } else {
                $position->create(['user_id' => $user->id, 'position_id' => (int)$request['extraPosition']]);
            }

            return redirect()
                ->route('blog.admin.users.edit', $user->id)
                ->with(['success' => 'Salvat cu succes!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $result = $user->forceDelete();
        if ($result) {
            return redirect()
                ->route('blog.admin.users.index')
                ->with(['success' => "Utilizatorul " . ucfirst($user->name). " a fost eliminat cu succes!"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Eroare la eliminare!']);
        }
    }
}
