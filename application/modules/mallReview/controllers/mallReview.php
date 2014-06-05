<?php

class MallReview extends Controller {

    function __construct() {
        parent::__construct();
        $this->loadModel('mallReview');
    }

    public function writeReview() {
        $this->model->writeReview();
    }

    public function totalReviews() {
        $this->model->totalReviews();
    }

    public function getReview() {
        $this->model->getReview();
    }

    public function updateReview() {
        $this->model->updateReview();
    }

    public function deleteReview() {
        $this->model->deleteReview();
    }

}
