<?php

class Mdl_shopNav extends Model {

    function __construct() {
        parent::__construct();
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
        $menu_pos = $_POST['menu_pos'];
        $shop_id = Session::get('shop_id');
        $submenu = $_POST['submenu'];
      $res = $this->db->select("SELECT id FROM shopnav where shop_id ='$shop_id' and menu_pos='$menu_pos'");
        $this->db->insert('shopnavsubmenu', array(
            'menu_id' => $res[0]['id'],
            'submenu_name' => $submenu
        ));
    }

     public function delteSubmenu($menu_pos) {
        $shop_id = Session::get('shop_id');
        $submenu = $_POST['submenu'];
      $res = $this->db->select("SELECT id FROM shopnav where shop_id ='$shop_id' and menu_pos='$menu_pos'");
      $menu_id = $res[0]['id'];
        $this->db->delete('shopnavsubmenu', "
            menu_id => $menu_id,
            submenu_name='$submenu'"
        );
    }
 

    public function deleteMenu(){
         $shop_id = Session::get('shop_id');
         $del = $_POST['menu_pos'];
             $this->db->delete('shopnav'," shop_id ='$shop_id' and
                menu_pos='$del'");
                
        
    }
    public function saveMenus() {
        
      
        $shop_id = Session::get('shop_id');
        $menu1 = $_POST['menu1'];
        $menu2 = $_POST['menu2'];
        $menu3 = $_POST['menu3'];
        $menu4 = $_POST['menu4'];
        $menu5 = $_POST['menu5'];
        $menu6 = $_POST['menu6'];
        $menu7 = $_POST['menu7'];
       
        if ($menu1) {
          
            $res1 = $this->db->select("SELECT * FROM shopnav where shop_id='$shop_id' and menu_pos='1'");
            if(count($res1)>0){
                  $this->db->update('shopnav', array(
               
                'menu_name' => $menu1
            )," shop_id ='$shop_id' and
                menu_pos='1'");
                
            }
            else{
                $this->db->insert('shopnav', array(
                'shop_id' => $shop_id,
                'menu_pos' => '1',
                'menu_name' => $menu1
            ));
            }
        }
        if ($menu2) {
            
            $res2 = $this->db->select("SELECT * FROM shopnav where shop_id='$shop_id' and menu_pos='2'");
            if(count($res2)>0){
                  $this->db->update('shopnav', array(
               
                'menu_name' => $menu2
            )," shop_id ='$shop_id' and
                menu_pos='2'");
                
            }
            else{
            $this->db->insert('shopnav', array(
                'shop_id' => $shop_id,
                'menu_pos' => '2',
                'menu_name' => $menu2
            ));
            }
        }
        if ($menu3) {
            
            $res3 = $this->db->select("SELECT * FROM shopnav where shop_id='$shop_id' and menu_pos='3'");
            if(count($res3)>0){
                  $this->db->update('shopnav', array(
               
                'menu_name' => $menu3
            )," shop_id ='$shop_id' and
                menu_pos='3'");
                
            }
            else{
            $this->db->insert('shopnav', array(
                'shop_id' => $shop_id,
                'menu_pos' => '3',
                'menu_name' => $menu3
            ));
            }
        }
        if ($menu4) {
            
            $res4 = $this->db->select("SELECT * FROM shopnav where shop_id='$shop_id' and menu_pos='4'");
            if(count($res4)>0){
                  $this->db->update('shopnav', array(
               
                'menu_name' => $menu4
            )," shop_id ='$shop_id' and
                menu_pos='4'");
                
            }
            else{
        
            $this->db->insert('shopnav', array(
                'shop_id' => $shop_id,
                'menu_pos' => '4',
                'menu_name' => $menu4
            ));
            }
        }
        if ($menu5) {
            
            $res5 = $this->db->select("SELECT * FROM shopnav where shop_id='$shop_id' and menu_pos='5'");
            if(count($res5)>0){
                  $this->db->update('shopnav', array(
               
                'menu_name' => $menu5
            )," shop_id ='$shop_id' and
                menu_pos='5'");
                
            }
            else{
            $this->db->insert('shopnav', array(
                'shop_id' => $shop_id,
                'menu_pos' => '5',
                'menu_name' => $menu5
            ));
            }
        }
        if ($menu6) {
            
            $res6 = $this->db->select("SELECT * FROM shopnav where shop_id='$shop_id' and menu_pos='6'");
            if(count($res6)>0){
                  $this->db->update('shopnav', array(
               
                'menu_name' => $menu6
            )," shop_id ='$shop_id' and
                menu_pos='6'");
                
            }
            else{
            $this->db->insert('shopnav', array(
                'shop_id' => $shop_id,
                'menu_pos' => '6',
                'menu_name' => $menu6
            ));
            }
        }
        if ($menu7) {
            
            $res7 = $this->db->select("SELECT * FROM shopnav where shop_id='$shop_id' and menu_pos='7'");
            if(count($res7)>0){
                  $this->db->update('shopnav', array(
               
                'menu_name' => $menu7
            )," shop_id ='$shop_id' and
                menu_pos='7'");
                
            }
            else{
            $this->db->insert('shopnav', array(
                'shop_id' => $shop_id,
                'menu_pos' => '7',
                'menu_name' => $menu7
            ));
            }
        }
        echo 'Menu List Updated';
    }

    public function listMenus($shop_id) {
       // $shop_id = Session::get('shop_id');
        $res = $this->db->select("SELECT * FROM shopnav where shop_id = '$shop_id' ORDER BY menu_pos asc");
        return $res;
    }
    public function submenus($shop_id,$menu=false){
        if($menu==false){
            //$shop_id = Session::get('shop_id');
            $menu_pos = $_POST['menu_pos'];
           $res = $this->db->select("SELECT * FROM shopnav where shop_id ='$shop_id' and menu_pos='$menu_pos'");
           if(count($res)>0){
           $menu = $res[0]['menu_name'];
           }
        }
         $res = $this->db->select("SELECT * FROM shopnavsubmenu where menu_id = (SELECT id from shopnav where menu_name='$menu') ORDER BY submenu_pos asc");
        return $res;
    }

}
