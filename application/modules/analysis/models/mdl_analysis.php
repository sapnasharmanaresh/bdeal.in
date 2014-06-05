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

        $DataSet = new pData;


        //print_r($res);
        foreach ($res as $key => $value) {
            print_r($res);
            $DataSet->AddPoint($value['hits'], 'Serie1');
            // echo $value['hits'];
        }
        //$DataSet->AddPoint(array(1, 4, 3, 4, 3, 3, 2, 1, 0, 7, 4, 3, 2, 3, 3, 5, 1, 0, 7), "Serie1");
        // $DataSet->AddPoint(array(1, 4, 2, 6, 2, 3, 0, 1, 5, 1, 2, 4, 5, 2, 1, 0, 6, 4, 2), "Serie2");
        $DataSet->AddAllSeries();
        $DataSet->SetAbsciseLabelSerie();
        $DataSet->SetSerieName("visitors", "Serie1");
        //$DataSet->SetSerieName("February", "Serie2");
        $DataSet->SetYAxisName("Visitors");
        $DataSet->SetXAxisName("days");

        $font = "assets/third-party/chart/Fonts/tahoma.ttf";

        // Initialise the graph
        $Test = new pChart(700, 230);
        $Test->setFixedScale(-2, 8);
        $Test->setFontProperties("$font", 8);
        $Test->setGraphArea(50, 30, 585, 190);
        $Test->drawFilledRoundedRectangle(7, 7, 693, 223, 5, 240, 240, 240);
        $Test->drawRoundedRectangle(5, 5, 695, 225, 5, 230, 230, 230);
        $Test->drawGraphArea(255, 255, 255, TRUE);
        $Test->drawScale($DataSet->GetData(), $DataSet->GetDataDescription(), SCALE_NORMAL, 150, 150, 150, TRUE, 0, 2);
        $Test->drawGrid(4, TRUE, 230, 230, 230, 50);

        // Draw the 0 line
        $Test->setFontProperties($font, 6);
        $Test->drawTreshold(0, 143, 55, 72, TRUE, TRUE);

        // Draw the cubic curve graph
        $Test->drawCubicCurve($DataSet->GetData(), $DataSet->GetDataDescription());

        // Finish the graph
        $Test->setFontProperties("$font", 8);
        $Test->drawLegend(600, 30, $DataSet->GetDataDescription(), 255, 255, 255);
        $Test->setFontProperties("$font", 10);
        // $Test->drawTitle(50, 22, "Example 2", 50, 50, 50, 585);
        $Test->Render("assets/third-party/graphs/example3.png");
    }

}
?>
















