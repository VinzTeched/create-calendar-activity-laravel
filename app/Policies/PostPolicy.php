<?php

namespace App\Policies;

use App\Models\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any odal= posts.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function viewAny(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the odal= post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\odal=Post  $odal=Post
     * @return mixed
     */
    public function view(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create odal= posts.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function create(admin $user)
    {
        return $this->getPermission($user, 5);
    }

    /**
     * Determine whether the user can update the odal= post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\odal=Post  $odal=Post
     * @return mixed
     */
    public function update(admin $user)
    {
        return $this->getPermission($user, 6);
    }

    /**
     * Determine whether the user can delete the odal= post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\odal=Post  $odal=Post
     * @return mixed
     */
    public function delete(admin $user)
    {
        return $this->getPermission($user, 8);
    }

    /**
     * Determine whether the user can create odal= posts.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function make(admin $user)
    {
        return $this->getPermission($user, 7);
    }

    /**
     * Determine whether the user can update the odal= post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\odal=Post  $odal=Post
     * @return mixed
     */
    public function updateUser(admin $user)
    {
        return $this->getPermission($user, 10);
    }

    /**
     * Determine whether the user can delete the odal= post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\odal=Post  $odal=Post
     * @return mixed
     */
    public function deleteUser(admin $user)
    {
        return $this->getPermission($user, 9);
    }

	public function tag(admin $user)
    {
        return $this->getPermission($user, 12);
    }
	
	public function category(admin $user)
    {
        return $this->getPermission($user, 13);
    }
	
	public function getPermission($user, $p_id)
    {
        
        foreach ($user->roles as $role){
			foreach ($role->permission as $permission){
				if ($permission->id == $p_id){
					return true;
				}
			}
		}
		return false;
    }

    /**
     * Determine whether the user can restore the odal= post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\odal=Post  $odal=Post
     * @return mixed
     */
    public function restore(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the odal= post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\odal=Post  $odal=Post
     * @return mixed
     */
    public function forceDelete(admin $user)
    {
        //
    }
}
