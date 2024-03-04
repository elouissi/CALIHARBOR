<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $UserRepositoryInterface;


    public function __construct(UserRepositoryInterface $UserRepositoryInterface){
        $this->UserRepositoryInterface = $UserRepositoryInterface;
    }
   
    /**
     * Display a listing of the resource.
     */
       /**
     * @OA\Get(
     *     path="/api/Get_ALL_Users",
     *     summary="Get all Users",
     *     @OA\Response(response="200", description="List of Users"),
     * )
     */
    public function index()
    {
        // $this->authorize('viewAny', User::class);
        $users = $this->UserRepositoryInterface->getAll();
        return view('Dashboard.users.index',compact('users'));
        
    }

    /**

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
      /**
     * @OA\Post(
     *     path="/api/Create_Users",
     *     summary="Create a new User",
     *     @OA\Parameter(
     *         name="description",
     *         in="query",
     *         description="User description",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="User created"),
     * )
     */
    public function store(UserRequest $request)
    {
        // $this->authorize('create', User::class);
        $form = $request->validated();
        $form['password'] =Hash::make($form['password']);
        $form['role_id'] = 2;
        //  $form['user_id'] = Auth::id();
         
        //  if (!isset($form['name'])) {
        //     return response()->json(['error' => 'Name field is required'], 422);
        // }
    
        $this->UserRepositoryInterface->create($form);
        $Users = $this->UserRepositoryInterface->getAll();
        return view('',compact('users'));

    }

    /**
     * Display the specified resource.
     */
       /**
     * @OA\Get(
     *     path="/api/Show_User/{id}",
     *     summary="Get a specific User",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="User ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="User found"),
     *     @OA\Response(response="404", description="User not found")
     * )
     */
    public function show(int $id)
    {
        $User = $this->UserRepositoryInterface->getById($id);
        $this->authorize('view', $User);
        return response()->json($User);

    }
    // public function getByUserId(){
    //     $user_id = Auth::id();
    //     $User = $this->UserRepositoryInterface->getByUserId($user_id);
    //     return response()->json($User);

    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
      /**
     * @OA\Put(
     *     path="/api/Update_User/{id}",
     *     summary="Update a specific User",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="User ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="description",
     *         in="query",
     *         description="User description",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="User updated"),
     *     @OA\Response(response="404", description="User not found")
     * )
     */
    public function update(UserRequest $request, int $id)
    {

        $User = User::findOrFail($id);
        $this->authorize('update', $User);
        $form = $request->validated();
        $this->UserRepositoryInterface->update($id , $form);
        $users = $this->UserRepositoryInterface->getAll();
        return view('',compact('users'));


        
    }

    /**
     * Remove the specified resource from storage.
     */
    
    /**
     * @OA\Delete(
     *     path="/api/Delete_Users/{id}",
     *     summary="Delete a specific User",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="User ID",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="User deleted"),
     *     @OA\Response(response="404", description="User not found")
     * )
     */
    public function destroy(int $id)
    {
        $User = User::findOrFail($id);
        $this->authorize('delete', $User);
        $this->UserRepositoryInterface->delete($id);
        $users = $this->UserRepositoryInterface->getAll();
        return view('',compact('users'));



        
    }
}
