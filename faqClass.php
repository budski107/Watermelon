<?php

class faq{
	private $faq_id, $title, $faq_content, $category_id;
	
	function __construct($title, $faq_content, $category_id) {
            $this->title = $title;
            $this->faq_content = $faq_content;
            $this->category_id = $category_id;
        }

        public function getFaq_id() {
            return $this->faq_id;
        }

        public function setFaq_id($faq_id) {
            $this->faq_id = $faq_id;
        }

        public function getTitle() {
            return $this->title;
        }

        public function setTitle($title) {
            $this->title = $title;
        }

        public function getFaq_content() {
            return $this->faq_content;
        }

        public function setFaq_content($faq_content) {
            $this->faq_content = $faq_content;
        }

        public function getCategory_id() {
            return $this->category_id;
        }

        public function setCategory_id($category_id) {
            $this->category_id = $category_id;
        }


}

?>