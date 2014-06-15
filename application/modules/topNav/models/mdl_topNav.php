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
            $val = $this->db->select("SELECT shop_id as id,shop_name as subname from shop");
        } else {
            //  $val = $this->db->select("SELECT * FROM submenus where menu_id=(SELECT id from topNav where name='$name')");
            $val = $this->db->select("SELECT category.category_id as id,category.category_name as subname FROM topnav 
                                                                LEFT JOIN submenus on  topnav.id=submenus.menu_id
                                                                LEFT JOIN category ON submenus.submenu_cat_id = category.category_id
                                                                LEFT JOIN subcategory ON subcategory.category_id = category.category_id where topnav.name='$name'");
        }
        // print_r($val);

        return $val;
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
            'subname' => $value
                ), "`id`='$id'");
        echo $value;
    }


    public function nav() {

        $pos1 = $_POST['position1'];
        $pos2 = $_POST['position2'];
        $pos3 = $_POST['position3'];
        $pos4 = $_POST['position4'];
        $pos5 = $_POST['position5'];
        $pos6 = $_POST['position6'];
        $pos7 = $_POST['position7'];


        $this->db->insert('shopNav', array(
            'shop_id' => $shop,
            '1' => $pos1,
            '2' => $pos2,
            '3' => $pos3,
            '4' => $pos4,
            '5' => $pos5,
            '6' => $pos6,
            '7' => $pos7
        ));
    }

    public function addSubmenu() {
        $position = $_POST['position'];
        $shop_id = Session::get('shop_id');
        $submenu = $_POST['submenu'];
      $res = $this->db->select("SELECT id FROM topnav where  and position='$position'");
        $this->db->insert('topnavsubmenu', array(
            'menu_id' => $res[0]['id'],
            'subname' => $submenu
        ));
    }

     public function delteSubmenu($position) {
        $shop_id = Session::get('shop_id');
        $submenu = $_POST['submenu'];
      $res = $this->db->select("SELECT id FROM topnav where  and position='$position'");
      $menu_id = $res[0]['id'];
        $this->db->delete('topnavsubmenu', "
            menu_id => $menu_id,
            subname='$submenu'"
        );
    }
 

    public function deleteMenu(){
         $del = $_POST['menu_pos'];
         echo $del;
             $this->db->update('topnav',
                     array(
                         'name'=>''
                     )," position='$del'");
                
        
    }
    public function saveMenus() {
 echo 'sdd';
        $menu1 = $_POST['menu1'];
        $menu2 = $_POST['menu2'];
        $menu3 = $_POST['menu3'];
        $menu4 = $_POST['menu4'];
        $menu5 = $_POST['menu5'];
        $menu6 = $_POST['menu6'];
        $menu7 = $_POST['menu7'];
       
        if ($menu1) {
          
            $res1 = $this->db->select("SELECT * FROM topnav where position='1'");
            if(count($res1)>0){
                  $this->db->update('topnav', array(
                    'name' => $menu1
            )," position='1'");
                
            }
            else{
                $this->db->insert('topnav', array(
                    'position' => '1',
                    'name' => $menu1
            ));
            }
        }
        if ($menu2) {
             $res2 = $this->db->select("SELECT * FROM topnav where position='2'");
            if(count($res2)>0){
                  $this->db->update('topnav', array(
               
                'name' => $menu2
            )," position='2'");
                
            }
            else{
            $this->db->insert('topnav', array(
                 'position' => '2',
                'name' => $menu2
            ));
            }
        }
        if ($menu3) {
            
            $res3 = $this->db->select("SELECT * FROM topnav where position='3'");
            if(count($res3)>0){
                  $this->db->update('topnav', array(
               'name' => $menu3
            ),"position='3'");
                
            }
            else{
            $this->db->insert('topnav', array(
                'position' => '3',
                'name' => $menu3
            ));
            }
        }
        if ($menu4) {
            $res4 = $this->db->select("SELECT * FROM topnav where position='4'");
            if(count($res4)>0){
                  $this->db->update('topnav', array(
                'name' => $menu4
            )," position='4'");
                
            }
            else{
            $this->db->insert('topnav', array(
                'position' => '4',
                'name' => $menu4
            ));
            }
        }
        if ($menu5) {
            $res5 = $this->db->select("SELECT * FROM topnav where position='5'");
            if(count($res5)>0){
                  $this->db->update('topnav', array(
                'name' => $menu5
            )," position='5'");
                
            }
            else{
            $this->db->insert('topnav', array(
                'position' => '5',
                'name' => $menu5
            ));
            }
        }
        if ($menu6) {
              $res6 = $this->db->select("SELECT * FROM topnav where position='6'");
            if(count($res6)>0){
                  $this->db->update('topnav', array(
                'name' => $menu6
            )," position='6'");
                
            }
            else{
            $this->db->insert('topnav', array(
                'position' => '6',
                'name' => $menu6
            ));
            }
        }
        if ($menu7) {
             $res7 = $this->db->select("SELECT * FROM topnav where position='7'");
            if(count($res7)>0){
                  $this->db->update('topnav', array(
                'name' => $menu7
            )," position='7'");
                
            }
            else{
            $this->db->insert('topnav', array(
                'position' => '7',
                'name' => $menu7
            ));
            }
        }
        echo 'Menu List Updated';
    }

    public function listMenus() {
       // $shop_id = Session::get('shop_id');
        $res = $this->db->select("SELECT * FROM topnav ORDER BY position asc");
        return $res;
    }
    public function submenus($shop_id,$menu=false){
        if($menu==false){
            //$shop_id = Session::get('shop_id');
            $position = $_POST['position'];
           $res = $this->db->select("SELECT * FROM topnav where  and position='$position'");
           if(count($res)>0){
           $menu = $res[0]['name'];
           }
        }
         $res = $this->db->select("SELECT * FROM topnavsubmenu where menu_id = (SELECT id from topnav where name='$menu') ORDER BY subposition asc");
        return $res;
    }

}
