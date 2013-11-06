<?php

class MessageView {

	public static function make($text, $action=null, $actionText=null, $actionIcon='arrow-right') {
		return View::make('message')
			->with('text', $text)
			->with('action', $action)
			->with('actionText', $actionText)
			->with('actionIcon', $actionIcon)
			->with('isMessageView', true);
	}

}
