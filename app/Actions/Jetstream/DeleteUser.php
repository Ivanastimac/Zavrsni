<?php

namespace App\Actions\Jetstream;
use App\Models\UserTasks;
use App\Models\UserAnsweredTasks;

use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        $user_task = UserTasks::where('id_user', $user->id);
        $user_answered_task = UserAnsweredTasks::where('id_user', $user->id);

        if($user_answered_task != null){
            $user_answered_task->delete();
        }

        if($user_task != null){
            $user_task->delete();
        }

        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}
