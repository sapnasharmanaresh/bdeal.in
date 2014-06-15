<?php

class Notification extends Controller
{

    public function __construct()
    {   parent::__construct();
   $this->loadModel('notification');
    }
     
    public function display(){
      //   $this->view->renderModule('notification','displayBar');
    }

    public function number()
    {

    }

    public function getNotification()
    {$limit = 7;
       $this->view->notif = $this->model->getNotification($limit);
       $this->view->renderModule('notification','admin_notificationBar');
     
    }

    public function setNotification()
    {
        $this->model->setNotification();
    }

    public function allNotifications(){
   
       $this->view->notifications =  $this->model->allNotifications();
       $this->view->renderModule('notification','v-allNotifications');
       }
}
