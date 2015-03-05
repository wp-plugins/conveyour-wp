<?php

class Conveyour_Login_Task extends Conveyour_Async_Task
{
    protected $action = 'set_logged_in_cookie';
    
    protected function prepare_data($data)
    {
        return array(
            'user_id' => get_current_user_id(),
        );
    }
    
    protected function run_action()
    {
        $id = cy_input_get('user_id');
        $user = new WP_User($id);
        
        conveyour_track($user, 'login');
    }
}