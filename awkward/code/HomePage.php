<?php
class HomePage extends Page {



}

class HomePage_Controller extends Page_Controller {

	private $latestPost;

	private function getLatest() {
		if(!isset($this->latestPost)) {
			$this->latestPost = BlogPage::get()->sort('Created','DESC')->first();
		}
		return $this->latestPost;
	}

	public function LastestPostContent() {
		return $this->getLatest()->Content;
	}

	public function LastestPostTitle() {
		return $this->getLatest()->Title;

	}

	public function PreviousArticle() {
		$prev =  BlogPage::get()->filter("Created:GreaterThan:Negation",$this->getLatest()->Created)
	   							->exclude("ID",$this->getLatest()->ID)
	   							->sort(array('Created' => 'ASC', 'ID' => 'ASC'))
	   							->limit(1)->first();

		if($prev) return $prev->Link;
	   	return false;
	}

	public function NextArticle() {
		$next =  BlogPage::get()->filter("Created:LessThan:Negation",$this->getLatest()->Created)
	   							->exclude("ID",$this->getLatest()->ID)
	   							->sort(array('Created' => 'DESC', 'ID' => 'ASC'))
	   							->limit(1)->first();
		if($next) return $next->Link;
		return false;
	}
}