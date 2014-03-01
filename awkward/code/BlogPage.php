<?php
class BlogPage extends Page {

	public function getCMSFields() {
		$f = parent::getCMSFields();
		$f->addFieldToTab('Root.Main',
			DateField::create('Created','Created')->setConfig('showcalendar', 1),
			'Content');

		return $f;
	}

}

class BlogPage_Controller extends Page_Controller {

}