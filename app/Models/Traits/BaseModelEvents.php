<?php

namespace App\Models\Traits;


use Illuminate\Database\Eloquent\Model;
use App\Models\Observers\BaseModelObserver;

/**
 * Whenever a new model is saved for the first time,
 * the creating and created events will fire.
 * If a model already existed in the database and the save method is called,
 * the updating / updated events will fire.
 * However, in both cases, the saving / saved events will fire.
 *
 * @CREATE: saving > creating > created > saved
 * @UPDATE: saving > updating > updated > saved
 *
 */
trait BaseModelEvents
{

    protected static function boot()
    {
        parent::boot();

        /** @var Model $ModelName */
        $ModelName = get_called_class();

        // Setup event bindings...
        $ModelName::observe(new BaseModelObserver);
    }

    public function onCreating()
    {

        // auto set user id
        if ($this->autoUserId && empty($this->user_id)) {
            $user_id = $this->getAuthUserId();
            if ($user_id > 0) {
                $this->user_id = $user_id;
            }
        }

        // auto set corp id
        if ($this->autoCorpId && empty($this->corp_id)) {
            $corp_id = $this->getAuthCorpId();
            if ($corp_id > 0) {
                $this->corp_id = $corp_id;
            }
        }

    }

    public function onCreated()
    {
    }

    public function onUpdating()
    {
    }

    public function onUpdated()
    {
    }

    public function onSaving()
    {

        // update contacts if true
        if ($this->autoUpdateContacts) {
            $this->updateContacts();
        }

    }

    public function onSaved()
    {
    }

    public function onDeleting()
    {
    }

    public function onDeleted()
    {
    }

    public function onRestoring()
    {
    }

    public function onRestored()
    {
    }
}