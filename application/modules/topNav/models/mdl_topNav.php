<?php

class Mdl_topNav extends Model {

    function __construct() {
        parent::__construct();
    }

    public function category() {
        $res = $this->db->select("SELECT * FROM topnav ORDER BY position");
     //   print_r($res);

        return $res;
    }

    public function subCategory($name) {
        //echo $name
        if ($name == 'Shops') {
            $val = $this->db->select("SELECT shop_id as id,shop_name as submenu_name from shop");
        } else {
            //  $val = $this->db->select("SELECT * FROM submenus where menu_id=(SELECT id from topNav where name='$name')");
            $val = $this->db->select("SELECT category.category_id as id,category.category_name as submenu_name FROM topnav 
                                                                LEFT JOIN submenus on  topnav.id=submenus.menu_id
                                                                LEFT JOIN category ON submenus.submenu_cat_id = category.category_id
                                                                LEFT JOIN subcategory ON subcategory.category_id = category.category_id where topnav.name='$name'");
        }
        // print_r($val);

        return $val;
    }

    public function addMenu() {
        $cat = $this->category();
        return count($cat);
    }

    public function positionNav() {
        echo $menu = $_POST['menu'];
        echo $position = $_POST['position'];
        if ($position == 'first') {
            $prevPos = $this->db->select("SELECT * from topnav");
            print_r($prevPos);
            foreach ($prevPos as $key => $value) {

                echo $value['id'] . "<br/>";
                echo $value['position'];
                $this->db->update("topnav", array(
                    'position' => $value['position'] + 1
                        ), "`id`='" . $value['id'] . "'");
            }
            $this->db->insert("topnav", array(
                'name' => $menu,
                'position' => 1
            ));
        }
        if ($position == 'last') {
            $prevPos = $this->db->select("SELECT * from topnav");
            print_r($prevPos);
            $last = count($prevPos) + 1;


            $this->db->insert("topnav", array(
                'name' => $menu,
                'position' => $last
            ));
        } else {
            $position = $this->db->select("SELECT position from topnav where name='$position'");
            $pos = $position[0]['position'];

            $prevPos = $this->db->select("SELECT * from topnav ORDER BY position");
            print_r($prevPos);
            $total = count($prevPos);


            foreach ($prevPos as $key => $value) {
                if ($value['position'] > $pos) {
                    $this->db->update("topnav", array(
                        'position' => $value['position'] + 1
                            ), "`id`='" . $value['id'] . "'");
                }
            }
            $this->db->insert("topnav", array(
                'name' => $menu,
                'position' => $pos + 1
            ));
        }
    }

    public function editSubmenu() {
        $id = $_POST['id'];
        $value = $_POST['value'];

        $this->db->update('submenus', array(
            'submenu_name' => $value
                ), "`id`='$id'");
        echo $value;
    }

}
