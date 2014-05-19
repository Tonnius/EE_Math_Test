<?php


class Topic extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'topics';

    public function tasks()
    {
        return $this->hasMany('Task');
    }

}