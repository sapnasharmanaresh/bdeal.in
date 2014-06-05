<?php

class Mdl_Notification extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function setNotification() {
        $notification = $_POST['notification'];
        $this->db->insert("notification", array(
            'notification' => $notification,
            'timestamp' => date('Y-M-d')
        ));
    }

    public function getNotification($limit) {
        $res = $this->db->select("SELECT * FROM notification order by timestamp desc Limit $limit");
        return $res;
    }

    public function allNotifications() {
        $notif = $this->db->select('SELECT * FROM `notification` order by timestamp desc');

        return $notif;
    }

}