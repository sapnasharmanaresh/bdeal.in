<?php

class Mdl_analysis extends Model {

    function __construct() {
        parent::__construct();
        //    echo   THIRD_PARTY."chart/pChart/pData.class";
        //  echo THIRD_PARTY."chart/Fonts/tahoma.ttf";
        // print_r($res);
    }

    public function visitors($role) {
        if ($role == 'admin') {
            $res = $this->db->select("SELECT * FROM visitors ORDER BY date");
            $this->chart($res);
        } else {
            $shop_id = Session::get('shop_id');
            $res = $this->db->select("SELECT * FROM shopvisitors where shop_id='$shop_id' ORDER BY date");
            $this->chart($res);
        }
    }

    public function chart($res) {
       
        $font = "assets/third-party/chart/Fonts/tahoma.ttf";
$hits='';
        $DataSet = new pData;
      foreach($res as $key=>$value){
          $hits .= $value['hits'].',';
      }
      $hitList = rtrim($hits,',');
        $DataSet->AddPoint(array(52,25,19,1,2,20,3,18,41,14,101,48,46,37,9,54,7,1,2,6,2,4,2,2,4,7,1,2,15,1,2,91,1,1,8,17,2), "Serie1");
        //$DataSet->AddPoint(array(1,4,2,6,2,3,0,1,5,1,2,4,5,2,1,0,6,4,2),"Serie2");
        $DataSet->AddAllSeries();
        $DataSet->SetAbsciseLabelSerie();
        $DataSet->SetSerieName("No of visitors", "Serie1");
       
        $DataSet->setYAxisName('No of visitors');
        // Initialise the graph
        $Test = new pChart(800, 300);
        $Test->setFixedScale(-2, 8);
        $Test->setFontProperties($font, 8);
        $Test->setGraphArea(50, 30, 585, 200);
        $Test->drawFilledRoundedRectangle(7, 7, 693, 223, 5, 240, 240, 240);
        $Test->drawRoundedRectangle(5, 5, 695, 225, 5, 230, 230, 230);
        $Test->drawGraphArea(255, 255, 255, TRUE);
        $Test->drawScale($DataSet->GetData(), $DataSet->GetDataDescription(), SCALE_NORMAL, 150, 150, 150, TRUE, 0, 2);
        $Test->drawGrid(4, TRUE, 230, 500, 230, 50);

        // Draw the 0 line
        $Test->setFontProperties($font, 6);
        $Test->drawTreshold(0, 143, 55, 72, TRUE, TRUE);

        // Draw the cubic curve graph
        $Test->drawCubicCurve($DataSet->GetData(), $DataSet->GetDataDescription());

        // Finish the graph
        $Test->setFontProperties($font, 8);
        $Test->drawLegend(600, 30, $DataSet->GetDataDescription(), 255, 255, 255);
        $Test->setFontProperties($font, 10);
      //  $Test->drawTitle(50, 22, "Example 4", 50, 50, 50, 585);
        $Test->Render(THIRD_PARTY."graphs/example5.png");

    }

}
?>
















