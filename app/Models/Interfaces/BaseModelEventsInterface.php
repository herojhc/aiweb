<?php

namespace App\Models\Interfaces;


interface BaseModelEventsInterface
{

    function onCreating();

    function onCreated();

    function onUpdating();

    function onUpdated();

    function onSaving();

    function onSaved();

    function onDeleting();

    function onDeleted();

    function onRestoring();

    function onRestored();

}